<html>
dasdsadsadsa
<body
    style="background-color:#eaeced;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000; padding: 30px;">
    <table
        style="max-width:818px ;margin:50px auto 10px;background-color:#ffffff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #011523;">
        <thead>
            <tr>
                <th style="text-align:left;font-weight:bold; font-size: 30px">Invoice</th>
                <th></th>
                <th></th>
                <th style="text-align:right;"><img style="max-width: 68px;"
                        src="https://avalonhouse.us/images/avalon-logo.png" alt="bachana tours"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0px 0px 0px; font-size: 14px; font-weight: bold;"><span>Invoice number 2632132132</span></td>
            </tr>

            <tr>
                <td style="padding: 0px 0px 30px; font-size 14px;" colspan="2"><span>Date due Febuary 5, 2022</span>
                </td>
            </tr>
            <tr>
                <td style="margin-right: 8rem; font-weight: bold; font-size: 15px;"><span>Stripe Shop</span></td>
                <td></td>
                <td style="font-weight: bold; font-size: 15px;"><span>Bill to</span></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: 600;font-size: 15px;"><span>Jane Diaz</span></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: 600;font-size: 15px;"><span>jane.diaz@stripe.com</span></td>
            </tr>
            <tr>
                <td style="padding-bottom: 16px;"></td>
            </tr>
            <tr>
                <td style="font-weight: bold; font-size: 22px; padding-bottom: 1rem;">$48.99 due February 5, 2022</td>
            </tr>
            <tr>
                <td>
                    <button style="border: none; background: #011523; color: white; padding: 10px 69px 12px 69px;">
                        Pay Online
                    </button>
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
            <?php
            $datas = [
                [
                    'name' => 'shoes1',
                    'quantity' => '1',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'shoes2',
                    'quantity' => '2',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'shoes3',
                    'quantity' => '3',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
                [
                    'name' => 'shoes4',
                    'quantity' => '4',
                    'unit_price' => '$48.99',
                    'amount' => '$48.99',
                ],
            ];
            ?>
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
            @foreach ($datas as $data)
                <tr>
                    <td style="font-weight: bold; font-size: 17px;">{{ $data['name'] }}</td>
                    <td style="font-size: 17px;">{{ $data['quantity'] }}</td>
                    <td style="padding: 0px 0px 0px 51px; font-size: 17px; font-weight: 500">{{ $data['unit_price'] }}</td>
                    <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: 500">{{ $data['amount'] }}</td>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">$48.99</td>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px;">$48.99</td>
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
                <td style="padding: 0px 0px 0px 89px; font-size: 17px; font-weight: bold;">$48.99</td>
            </tr>

        </tbody>
        <tfooter>
            <tr>
                <td colspan="4" style="padding-top: 94px;">
                    <hr style="border: 1px solid #011523; opacity: 0.1;">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:14px;padding:0px 15px 0px 0px;">
                    <strong style="display:block;margin:0 0 10px 0; font-size: 18px; font-weight: bold;">Pay with ACH or wire transfer</strong>
                    <span style="font-size: 14px; font-weight: 500; padding-bottom: 7px;">A routing number, account number, and SWIFT code will be generated for this customer when the
                        invoice is sent</span>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 7px;">
                    <span style="font-size: 14px; font-weight: 500;">Bank Name ___</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 14px; font-weight: 500;">Routing number ___</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 14px; font-weight: 500;">Account number ___</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 14px; font-weight: 500;">Swift code ___</span>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 7px;"> 
                    <span style="font-size: 14px; font-weight: 500;">26B34523-DRAFT $48.99 due February 5, 2022</span>
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>
