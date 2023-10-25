{{ trans_choice(__('Product|Products'), 1) }}
{{ __('Ticket') }}: {{ $mailData['product']['ticket'] }}
{{ __('Queue') }}: {{ $mailData['product']['queue'] }}
{{ __('EAN') }}: {{ $mailData['product']['ean'] }}
{{ __('Business Unit') }}: {{ $mailData['product']['negocio'] }}
{{ __('Department') }}: {{ $mailData['product']['departamento'] }}
{{ __('Group') }}: {{ $mailData['product']['grupo'] }}
{{ __('Category') }}: {{ $mailData['product']['categoría'] }}
{{ __('Subcategory') }}: {{ $mailData['product']['subcategoría'] }}
{{ __('Description') }}: {{ $mailData['product']['descripción'] }}
{{ __('Reference') }}: {{ $mailData['product']['referencia'] }}
{{ __('Brand') }}: {{ $mailData['product']['marca'] }}
{{ __('Measure') }}: {{ $mailData['product']['medida'] }}
{{ __('Color') }}: {{ $mailData['product']['color'] }}
{{ __('Cost') }}: {{ $mailData['product']['costo'] }}
{{ __('Provider NIT') }}: {{ $mailData['product']['nit_Proveedor'] }}
{{ __('Provider Name') }}: {{ $mailData['product']['razon_social_proveedor'] }}
{{ __('Starting Date') }}: {{ $mailData['product']['fecha_inicio_gestion'] }}
{{ __('Days Passed') }}: {{ $mailData['product']['dias_transcurridos'] }}

{{ trans_choice(__('Contact|Contacts'), 1) }}
{{ __('Name') }}: {{ $mailData['validated']['name'], }}
{{ __('Mobile') }}: {{ $mailData['validated']['tel'], }}
{{ __('Email') }}: {{ $mailData['validated']['email'], }}
{{ __('Notes') }}: {{ $mailData['validated']['notes'], }}