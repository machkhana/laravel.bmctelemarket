<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>ხელშეკრულება</title>
    <style type='text/css'>
        .style1 {
            font-size: 18px;
            font-weight: bold;
        }
        .style2 {font-size: 18px}
        @media print {
            input#printButton {
                display: none;
            }
        }
    </style>
    <script>
        ns4 = (document.layers)? true:false;
        ie4 = (document.all)? true:false;
        function myprintfunction(id) {
            if (ns4) document.layers[id].visibility = "hide"
            else if (ie4) document.all[id].style.visibility = "hidden"
            window.print();
        }
    </script>
</head>
<body>
<div align="left" style="margin-left:5px; margin-top:10px; position:fixed;">
    <input type="button" id="printButton" onClick="window.print(); window.close();" value="ბეჭდვა" />
</div>
<table width='876' border='0' align='center'>
    <tr>
        <td height='31' colspan='3' align='center'><p class='style1'>&nbsp;</p>
            <p class='style1'></p></td>
    </tr>
    <tr>
        <td colspan='3' class='print_font'>
            <div align='left'>
                <p>საშუამავლო ხელშეკრულების დანართი N 1<br>
                    შემსრულებლის გასამრჯელოს გაანგარიშების წესი</p>
                <ol>
                    <ol>
                        <li>წინამდებარე დანართი წარმოადგენს საშუამავლო ხელშეკრულების განუყოფელ ნაწილს</li>
                        <li>წინამდებარე დანართი ძალაშია ხელშეკრულების ხელმოწერასთან ერთად.</li>
                        <li>წინამდებარე დანართში ცვლილებების შეტანა ხორციელდება საშუამავლო ხელშეკრულების 3.1. პუნქტის შესაბამისად.</li>
                    </ol>
                </ol>
            </div><br />
            <div align="center">
                @if($client->position->pos_name == 'დიზაინერი')
                <table border="1" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td width="330" valign="top"><p>მომხმარებლის ფასდათმობა პროცენტებში (%) საცალო ფასიდან</p></td>
                        <td width="330" valign="top"><p>დიზაინერის გასამრჯელო მომხმარებლის მიერ გადახდილი თანხიდან პროცენტებში (%)</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>5%</p></td>
                        <td width="330" valign="top"><p>10%</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>6%</p></td>
                        <td width="330" valign="top"><p>9%</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>7%</p></td>
                        <td width="330" valign="top"><p>8%</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>8%</p></td>
                        <td width="330" valign="top"><p>7%</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>9%</p></td>
                        <td width="330" valign="top"><p>6%</p></td>
                    </tr>
                    <tr>
                        <td width="330" valign="top"><p>10%</p></td>
                        <td width="330" valign="top"><p>5%</p></td>
                    </tr>
                </table>
                @elseif($client->position->pos_name == 'ხელოსანი')
                    <table border="1" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td width="330" valign="top"><p>მომხმარებლის ფასდათმობა პროცენტებში(%)საცალო ფასიდან</p></td>
                            <td width="330" valign="top"><p>ხელოსნის გასამრჯელო მომხმარებლის მიერ გადახდილი თანხიდან პროცენტებში (%0</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>1%-2%-3%-4%-5%</p></td>
                            <td width="330" valign="top"><p>10%</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>6%</p></td>
                            <td width="330" valign="top"><p>4%</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>7%</p></td>
                            <td width="330" valign="top"><p>3%</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>8%</p></td>
                            <td width="330" valign="top"><p>2%</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>9%</p></td>
                            <td width="330" valign="top"><p>1%</p></td>
                        </tr>
                        <tr>
                            <td width="330" valign="top"><p>10%</p></td>
                            <td width="330" valign="top"><p>0%</p></td>
                        </tr>
                    </table>
                    @else
                    @endif
            </div>
            <br />
            <br />
            <p align='center' class='style1'>10.	მხარეთა რეკვიზიტები და ხელმოწერები:</p>    <table align='center' width='787' border='0'>
                <tr>
                    <td width='478'><strong>“კომპანია” </strong></td>
                    <td width='299'> <div align='left'><strong>“შემსრულებელი”</strong></div></td>
                </tr>
                <tr>
                    <td><strong>შპს “ბი-ემ-სი გორგია” </strong></td>
                    <td><div align='left'><strong>{{$client->firstname.' '.$client->lastname}}</strong></div></td>
                </tr>
                <tr>
                    <td><strong>მისამართი: ბათუმი,სოხუმის ქ.10</strong></td>
                    <td><div align='left'><strong>პირ.№: {{$client->idnumber}}</strong></div></td>
                </tr>
                <tr>
                    <td><strong>საიდენტიფიკაციო კოდი: 245621288</strong></td>
                    <td><div align='left'><strong>მისამართი: {{$client->city->name.', '.$client->address}}</strong></div></td>
                </tr>
                <tr>
                    <td><strong>ს.ს “თი-ბი-სი ბანკი”-ის ბათუმის ფილიალი</strong></td>
                    <td><div align='left'><strong>ტელ: {{$client->mobile}}</strong></div></td>
                </tr>
                <tr>
                    <td><strong>ბანკის კოდი:TBCBGE22 </strong></td>
                    <td><div align='left'></div></td>
                </tr>
                <tr>
                    <td><strong>ანგარიში:GE62 TB10 07536020100008</strong></td>
                    <td><div align='left'></div></td>
                </tr>
                <tr>
                    <td><p><strong>სარეგ.სერტიფ.087261  26.07.2008წ </strong></p></td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td height="31">
                        <div style="margin-top:30px;"><strong>დირექტორის მინდობილი პირი:</strong></div></td>
                    <td>
                        <div style="margin-top:30px;"><strong>“შემსრულებელი”</strong></div></td>
                </tr>
                <tr>
                    <td><strong>(
                            @if($client->city->name == 'ბათუმი')
                                {{__('ხვიჩა პაპუნიძე')}}
                            @else
                                {{__('გია გორგოშაძე')}}
                            @endif
                        )</strong></td>
                    <td><div align="left" style="font-family:avaza;"><strong>({{$client->firstname.' '.$client->lastname}})</strong></div></td>
                </tr>
            </table></td>
    </tr>
    <tr>
        <td width="190">&nbsp;</td>
        <td width="423">&nbsp;</td>
        <td width="249" align='right'>    </td>
    </tr>
</table>
<br />
</body>
</html>