<?php 
  function generateInvoiceNumber($id) {
    $year = date("y");
    $month = date("m");
    $day = date("d");
    $invoiceNumber = sprintf("%03d%s%02d%s%02d%s", $id, 'A', $month, 'H', $day, $year);

    return $invoiceNumber;
}
$id = $data['id'];
$invoiceNumber = generateInvoiceNumber($id);

?>

<html>

Invoice
<body
    style="background-color:#eaeced;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000; padding-top:5px; padding-bottom:22px;">
    <table
        style="max-width:838px ;margin:50px auto 10px;background-color:#ffffff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #011523;">
        <thead>
            <tr>
                <th style="text-align:left;font-weight:bold; font-size: 30px">Invoice</th>
                <th></th>
                <th></th>
                <th style="text-align:right;">
                    <img style="max-width: 68px;" src="{{ asset('images/avalon-logo.png')}}" alt="bachana tours">
                </th>
            </tr>
        </thead>    
        <tbody>
            <tr>
                <td colspan="4" style="padding: 0px 0px 0px; font-size: 14px; font-weight: bold;"><span>Invoice number <?php echo $invoiceNumber; ?></span></td>
            </tr>

            <tr>
                <td colspan="4" style="padding: 0px 0px 30px; font-size: 14px;"><span>Date due {{ date("F j, Y") }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="margin-right: 8rem; font-weight: bold; font-size: 15px;"><span>Avalon House</span></td>
             
                <td style="font-weight: bold; font-size: 15px;"><span>Bill to</span></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: 600;font-size: 15px;"><span>{{ $data['fullName'] }}</span></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: 600;font-size: 15px;"><span>{{ $data['email1'] }}</span></td>
            </tr>
            <tr>
                <td style="padding-bottom: 16px;"></td>
            </tr>
            <tr>
                <td colspan="4" style="font-weight: bold; font-size: 22px; padding-bottom: 1rem;">${{ number_format($data['totalAmount'], 2, '.', ',') }} {{ date("F j, Y") }}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <form action="{{ route('stripe.session') }}" method="GET" target="_blank">
                        @if(isset($data['promoCode']) && $data['promoCode'] != null)
                            <input type="hidden" name="promoCode" value="{{ htmlspecialchars(implode(', ', (array)$data['promoCode'])) }}">
                        @endif
                        <input type="hidden" name="totalAmount" value="{{ $data['totalAmount'] }}">
                        <input type="hidden" name="client_email" value="{{ $data['email1'] }}">
                        <input type="hidden" name="client_name" value="{{ $data['fullName'] }}">
                        <input type="hidden" name="services" value="{{ json_encode($services) }}">
                        <button type="submit" style="border: none; background: #011523; color: white; padding: 10px 69px 12px 69px; text-decoration: none; cursor: pointer;">
                            <span>Pay Online</span>
                        </button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 14px; font-weight: 600;">Thanks for your business!</p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            {{-- <?php
            $datas = [
                [
                    'name' => 'Film Synopsis',
                    'quantity' => '1',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'Film Synopsis',
                    'quantity' => '2',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'Film Synopsis',
                    'quantity' => '3',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'Film Synopsis',
                    'quantity' => '4',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
            ];
            ?> --}}
            <tr>
                <td style="font-size: 14px">Description</td>
                <td style="font-size: 14px">Qty</td>
                <td style="font-size: 14px; padding: 0px 0px 0px 51px">Unit Price</td>
                <td style="font-size: 14px; padding: 0px 0px 0px 89px">Amount</td>
            </tr>
            <tr>
                <td colspan="4"> <!-- This will make the td span all 4 columns -->
                    <hr style="border: 1px solid #011523">
                </td>
            </tr>
            @foreach ($services as $key => $service)
                <tr>
                    <td style="font-weight: bold; font-size: 17px;">{{ $service->title}}</td>
                    <td style="font-size: 17px;">1</td>
                    <td style="padding: 0px 0px 0px 51px; font-size: 17px; font-weight: 500">${{ number_format($service->price, 2, '.', ',') }}</td>
                    <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: 500">${{ number_format($service->price, 2, '.', ',') }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td colspan="3">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 17px; font-weight: 500; padding-bottom: 10px;">Subtotal</td>
                <td></td>
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">${{ number_format($data['subTotal'], 2, '.', ',') }}</td>
            </tr>
            @if($coupon && $coupon['amount_off'] != null)
            <tr>
                <td></td>
                <td colspan="3">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
     
            <tr>
               <td></td>
               <td style="font-size: 17px; font-weight: 500; padding-bottom: 10px;">Discount</td>
               <td></td>
               <td style="padding: 0px 0px 0px 89px; font-size: 17px;">${{ number_format($coupon['amount_off'] / 100.00, 2, '.', ',') }}</td>
            </tr>
            @endif
            <tr>
                <td></td>
                <td colspan="3">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 17px;">Total</td>
                <td></td>
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">${{ number_format($data['totalAmount'], 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 17px; font-weight: bold;">Amount Due</td>
                <td></td>
                <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: bold;">${{ number_format($data['totalAmount'], 2, '.', ',') }}</td>
            </tr>

        </tbody>
        <tfooter>
            <tr>
                <td colspan="4" style="padding-top: 94px;">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:14px;padding:0px 15px 0px 0px;">
                    <strong style="display:block;margin:0 0 10px 0; font-size: 18px; font-weight: bold;">Pay with ACH or wire transfer</strong>
                    <span style="font-size: 14px; font-weight: 500; padding-bottom: 7px;">A routing number, account number, and SWIFT code will be generated for this customer when the
                        invoice is sent</span>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top: 7px;">
                    <span style="font-size: 14px; font-weight: 500;">Bank Name: Jpmorgan Chase Bank</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Routing number: 071000013</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Account number: 595318158</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Swift code: CHASUS33</span>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top: 7px;"> 
                    <span style="font-size: 14px; font-weight: 500;"><?php echo $invoiceNumber; ?>-DRAFT ${{number_format($data['totalAmount'], 2, '.', ',') }} {{ date("F j, Y") }}</span>
                </td>
            </tr>
        </tfooter>
    </table>
</body>
</html>
