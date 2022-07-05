<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //  show the checkout page transaction with tour package, transaction detail , and user 
    //  return to view with items 
    public function index($id)
    {
        $item = Transaction::with(['details', 'tour_package', 'user'])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    // 
    public function process($id)
    {
        $transaction = Transaction::where('users_id', Auth::user()->id)
            ->where('tour_packages_id', $id)
            ->whereIn('transaction_status', ['IN_CART', 'PENDING'])
            ->first();


        if (!$transaction) {
            $tour_package = TourPackage::findOrFail($id);
            $transaction = Transaction::create([
                'tour_packages_id' => $id,
                'users_id' => Auth::user()->id,
                'additional_visa' => 0,
                'transaction_total' => $tour_package->price,
                'transaction_status' => 'IN_CART'
            ]);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'username' => Auth::user()->username,
                'nationality' => 'ID',
                'is_visa' => false,
                'doe_passport' => Carbon::now()->addYears(5)
            ]);
        }
        // return "$transaction->id";
        return redirect()->route('checkout', $transaction->id);
    }

    //
    public function remove($detail_id)
    {
        $item = TransactionDetail::findorFail($detail_id);

        $transaction = Transaction::with(['details', 'tour_package'])
            ->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->tour_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }


    //
    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $transactionDetails =

            $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['tour_package'])->find($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->tour_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    //
    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
