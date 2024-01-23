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
                    <img style="max-width: 68px;" src="https://avalonhouse.us/images/avalon-logo.png" alt="bachana tours">
                </th>
            </tr>
        </thead>    
        <tbody>
            <tr>
                <td colspan="4" style="padding: 0px 0px 0px; font-size: 14px; font-weight: bold;"><span>Invoice number 2632132132</span></td>
            </tr>

            <tr>
                <td colspan="4" style="padding: 0px 0px 30px; font-size: 14px;"><span>Date due {{ date("F j, Y") }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="margin-right: 8rem; font-weight: bold; font-size: 15px;"><span>Stripe Shop</span></td>
             
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
                <td colspan="4" style="font-weight: bold; font-size: 22px; padding-bottom: 1rem;">$48.99 due {{ date("F j, Y") }}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <form action="{{ route('stripe.session') }}" method="GET" target="_blank">
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
            @foreach ($services as $service)
                <tr>
                    <td style="font-weight: bold; font-size: 17px;">{{ $service->title}}</td>
                    <td style="font-size: 17px;">1</td>
                    <td style="padding: 0px 0px 0px 51px; font-size: 17px; font-weight: 500">{{ $service->price }}</td>
                    <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: 500">{{ $service->price }}</td>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">{{ $data['subTotal']}}</td>
            </tr>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">{{ $data['totalAmount']}}</td>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: bold;">{{ $data['totalAmount']}}</td>
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
                    <span style="font-size: 14px; font-weight: 500;">Bank Name ___</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Routing number ___</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Account number ___</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="font-size: 14px; font-weight: 500;">Swift code ___</span>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top: 7px;"> 
                    <span style="font-size: 14px; font-weight: 500;">26B34523-DRAFT $48.99 due February 5, 2022</span>
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>
