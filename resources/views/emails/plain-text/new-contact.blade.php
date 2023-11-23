<br><br>

<table style="border: 1px solid; text-align: left;">
    <thead >
        <th colspan="2" >
            <h3>{{ __('Requested Product Info') }}</h3>
        </th>
    </thead>
    <tbody >
        <tr>
            <th>{{ __('Ticket') }}</th>
            <td>{{ $mailData['product']['ticket'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Queue') }}</th>
            <td>{{ $mailData['product']['queue'] }}</td>
        </tr>
        <tr>
            <th>{{ __('EAN') }}</th>
            <td>{{ $mailData['product']['ean'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Business Unit') }}</th>
            <td>{{ $mailData['product']['negocio'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Department') }}</th>
            <td>{{ $mailData['product']['departamento'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Group') }}</th>
            <td>{{ $mailData['product']['grupo'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Category') }}</th>
            <td>{{ $mailData['product']['categoría'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Subcategory') }}</th>
            <td>{{ $mailData['product']['subcategoría'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Description') }}</th>
            <td>{{ $mailData['product']['descripción'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Reference') }}</th>
            <td>{{ $mailData['product']['referencia'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Brand') }}</th>
            <td>{{ $mailData['product']['marca'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Measure') }}</th>
            <td>{{ $mailData['product']['medida'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Color') }}</th>
            <td>{{ $mailData['product']['color'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Cost') }}</th>
            <td>{{ $mailData['product']['costo'] }}</td>
        </tr>
        <tr>
            <td><b>{{ __('Current Cost') }}</b></td>
            <td>
                {{ calculateCostWithDiscount($mailData['product']['costo'], $mailData['product']['dias_transcurridos'], $mailData['product']['custom_descuento']) }}
            </td>
        </tr>
        <tr>
            <td><b>{{ __('Discount') }}</b></td>
            <td>
                {{ calculateDiscount($mailData['product']['costo'], $mailData['product']['dias_transcurridos'], $mailData['product']['custom_descuento']) }}
            </td>
        </tr>
        <tr>
            <th>{{ __('Provider NIT') }}</th>
            <td>{{ $mailData['product']['nit_Proveedor'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Provider Name') }}</th>
            <td>{{ $mailData['product']['razon_social_proveedor'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Starting Date') }}</th>
            <td>{{ $mailData['product']['fecha_inicio_gestion'] }}</td>
        </tr>
        <tr>
            <th>{{ __('Days Passed') }}</th>
            <td>{{ $mailData['product']['dias_transcurridos'] }}</td>
        </tr>

    </tbody>
</table>

<br><br>

<table style="border: 1px solid; text-align: left;">
    <thead>
        <th colspan="2">
            <h3>{{ __('Contact Info') }}</h3>
        </th>
    </thead>
    <tbody>
        <tr>
            <th>{{ __('Name') }}</th>
            <td>{{ $mailData['validated']['name'], }}</td>
        </tr>
        <tr>
            <th>{{ __('Mobile') }}</th>
            <td>{{ $mailData['validated']['phone'], }}</td>
        </tr>
        <tr>
            <th>{{ __('Email') }}</th>
            <td>{{ $mailData['validated']['email'], }}</td>
        </tr>
        <tr>
            <th>{{ __('Notes') }}</th>
            <td>{{ $mailData['validated']['notes'], }}</td>
        </tr>        
    </tbody>
</table>