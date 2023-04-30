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
            
            table {
                margin-top: 5px;
            }

            th {
                background-color: #ccc;
            }

            tr {
                text-align: center;
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

        <table width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>1 wartość In</th>
                    <th>2 wartość In</th>
                    <th>1 wartość Out</th>
                    <th>2 wartość Out</th>
                    <th>Data utworzenia</th>
                    <th>Data edycji</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records ?? [] as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->firstIn }}</td>
                    <td>{{ $record->secondIn }}</td>
                    <td>{{ $record->firstOut }}</td>
                    <td>{{ $record->secondOut }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>