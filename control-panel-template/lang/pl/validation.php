<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute musi zostać zaakceptowany.',
    'accepted_if' => ':attribute musi zostać zaakceptowane kiedy :other jest :value.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą po :date.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub równą :date.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'ascii' => ':attribute pole może zawierać tylko jednobajtowe znaki alfanumeryczne i symbole.',
    'before' => ':attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'numeric' => ':attribute musi mieścić się w przedziale od :min do :max.',
        'file' => ':attribute musi znajdować się w przedziale od :min do :max kilobajtów.',
        'string' => ':attribute musi mieć od :min do :max znaków.',
        'array' => ':attribute musi zawierać elementy od :min do :max.',
    ],
    'boolean' => 'Pole :attribute musi mieć wartość prawda lub fałsz.',
    'can' => ':attribute pole zawiera nieautoryzowaną wartość.',
    'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
    'current_password' => 'Nieprawidłowe hasło.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :date.',
    'date_format' => ':attribute nie pasuje do formatu :format.',
    'decimal' => 'Pole :attribute musi mieć :decimal miejsc dziesiętnych.',
    'declined' => 'Pole :attribute musi być odrzucone.',
    'declined_if' => 'Pole :attribute musi być odrzucone kiedy :other jest :value.',
    'different' => ' :attribute i :other muszą być różne.',
    'digits' => ':attribute musi być :digits cyfry.',
    'digits_between' => ':attribute musi zawierać się między :min a :max cyfr.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'doesnt_end_with' => 'Pole :attribute nie może kończyć się jednym z poniższych znaków: :values.',
    'doesnt_start_with' => 'Pole :attribute nie może zaczynać się od jednego z poniższych: :values.',
    'email' => 'The :attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z poniższych znaków: :values.',
    'enum' => 'Wybrany :attribute jest nieprawidłowy.',
    'exists' => 'Zaznaczony :attribute jest nieprawidłowy.',
    'extensions' => 'Pole :attribute musi mieć jedno z następujących rozszerzeń: :values.',
    'file' => ':attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => ':attribute musi być większy niż :value.',
        'file' => ':attribute musi być większy niż :value kilobajtów.',
        'string' => ':attribute musi być większy niż :value znaków.',
        'array' => ':attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większy lub równy :value.',
        'file' => ':attribute musi być większy lub równy :value w kilobajtach.',
        'string' => ':attribute musi być większy lub równy :value znaków.',
        'array' => ':attribute musi mieć :value wartości lub więcej.',
    ],
    'hex_color' => ':attribute musi być prawidłowym kolorem szesnastkowym.',
    'image' => ':attribute musi być obrazem.',
    'in' => 'Zaznaczony :attribute jest nieprawidłowy.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem JSON.',
    'lowercase' => ':attribute musi być zapisany małymi literami.',
    'lt' => [
        'numeric' => ':attribute musi być mniejszy niż :value.',
        'file' => ':attribute musi być mniejszy niż :value kilobajtów.',
        'string' => ':attribute musi mieć mniej niż :value znaków.',
        'array' => ':attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'file' => ':attribute musi być mniejszy lub równy :value w kilobajtach.',
        'string' => ':attribute musi być mniejszy lub równy :value znaków.',
        'array' => ':attribute nie może zawierać więcej niż: value elementów.',
    ],
    'mac_address' => 'Pole :attribute musi być prawidłowym adresem MAC.',
    'max' => [
        'numeric' => ':attribute nie może być większa niż :max.',
        'file' => ':attribute nie może być większa niż :max kilobajtów.',
        'string' => ':attribute nie może być większa niż :max znaków.',
        'array' => ':attribute nie może mieć więcej elementów niż :max.',
    ],
    'max_digits' => 'Pole :attribute nie może mieć więcej niż :max cyfr.',
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => ':attribute musi wynosić co najmniej :min.',
        'file' => ':attribute musi mieć co najmniej :min kilobajtów.',
        'string' => ':attribute musi mieć co najmniej :min znaków.',
        'array' => ':attribute musi mieć co najmniej :min elementów.',
    ],

    'min_digits' => 'Pole :attribute musi mieć co najmniej :min cyfr.',
    'missing' => 'Musi brakować pola :attribute.',
    'missing_if' => 'Musi brakować pola :attribute kiedy :other jest :value.',
    'missing_unless' => 'Pole :attribute musi być nieobecne, chyba że :other jest :value.',
    'missing_with' => 'Pole :attribute musi być nieobecne, gdy :values jest obecne.',
    'missing_with_all' => 'Pole :attribute musi być nieobecne, gdy :values jest obecne.',
    'multiple_of' => ':attribute musi być wielokrotnością :value.',
    'not_in' => 'Zaznaczony :attribute jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => [
        'letters' => 'Pole :attribute musi zawierać co najmniej jedną literę.',
        'mixed' => 'Pole :attribute musi zawierać co najmniej jedną wielką i jedną małą literę.',
        'numbers' => 'Pole :attribute musi zawierać co najmniej jedną liczbę.',
        'symbols' => 'Pole :attribute musi zawierać co najmniej jeden symbol.',
        'uncompromised' => 'Podany :attribute pojawił się w wycieku danych. Wybierz inny :attribute.',
    ],
    'present' => 'Pole :attribute musi być obecne.',
    'present_if' => 'Pole :attribute musi być obecne kiedy :other jest :value.',
    'present_unless' => 'Pole :attribute musi być obecne, chyba że :other jest :value.',
    'present_with' => 'Pole :attribute musi być obecne, gdy :values jest obecne.',
    'present_with_all' => 'Pole :attribute musi być obecne, gdy :values jest obecne.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione, gdy :other jest :value.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other znajduje się w :values.',
    'prohibits' => 'Pole :attribute zabrania obecności pola :other.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_array_keys' => ':attribute pole musi zawierać pozycje: :values.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other to :value.',
    'required_if_accepted' => ':attribute jest wymagane kiedy :other jest zaakceptowane.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other znajduje się w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy występuje :values.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy obecne są wartości:.',
    'required_without' => 'Pole :attribute jest wymagane, gdy nie ma :values.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy nie ma żadnej z :values.',
    'same' => ':attribute i :other muszą być zgodne.',
    'size' => [
        'numeric' => ':attribute musi mieć wartość :size.',
        'file' => ':attribute musi mieć :size w kilobajtach.',
        'string' => ':attribute musi zawierać :size znaków.',
        'array' => ':attribute musi zawierać pozycje :size.',
    ],
    'starts_with' => ':attribute musi zaczynać się od jednej z następujących wartości:: values.',
    'string' => ':attribute musi być łańcuchem.',
    'timezone' => ':attribute musi być prawidłową strefą.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => 'Nie udało się przesłać :attributeu.',
    'uppercase' => ':attribute musi być zapisane wielkimi literami.',
    'url' => 'Format :attribute jest nieprawidłowy.',
    'ulid' => ':attribute musi być prawidłowym identyfikatorem ULID.',
    'uuid' => ':attribute musi być prawidłowym identyfikatorem UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
