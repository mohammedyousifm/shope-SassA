<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class StoreWalletDepositRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'deposit_method_id'     => ['required', 'exists:deposit_methods,id'],
            'amount'                => ['required', 'numeric', 'min:5000'],
            'transaction_reference' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'deposit_method_id.required' => 'يرجى اختيار طريقة الإيداع',
            'amount.required'            => 'يرجى إدخال المبلغ',
            'amount.min'                 => 'الحد الأدنى للإيداع هو 5000 ج.س',
            'transaction_reference.required' => 'يرجى إدخال رقم العملية',
        ];
    }
}
