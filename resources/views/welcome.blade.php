<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            input {
                margin-bottom: 5px;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input[type=number] {
                -moz-appearance: textfield;
            }

            button {
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="{{ route('exchangeValues') }}">
        @csrf
            <div>
                <label for="first">Pierwsza wartość</label>
                <input class="field" type="number" style="border-style: solid" name="first" placeholder="" value="">
            </div>
            <div>
                <label for="second">Druga wartość</label>
                <input type="number" style="border-style: solid" name="second" placeholder="" value="">
            </div>
            <button type="submit">Dodaj</button>
        </form>
    </body>
</html>