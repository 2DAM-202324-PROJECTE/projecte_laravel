<div>
    <div class="m-4 pb-12">
        <style>
            .first {
                transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            }
            .first:hover {
                box-shadow: 0 0 40px 40px red inset;
            }
            .btn {
                box-sizing: border-box;
                appearance: none;
                background-color: transparent;
                border: 2px solid red;
                border-radius: 0.6em;
                color: red;
                cursor: pointer;
                display: flex;
                align-self: center;
                font-size: 14px;
                font-weight: 400;
                line-height: 1;
                margin: 20px;
                padding: 0.8em 1.5em;
                text-decoration: none;
                text-align: center;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
            }
            .btn:hover,
            .btn:focus {
                color: #fff;
                outline: 0;
            }
        </style>
        <div class=" mt-6">
            <h1 class="text-white text-center text-xl">SALES DE XAT DISPONIBLES</h1>
            <h3 class="text-white text-end text-base mr-2">Les meves sales de xat</h3>
        </div>
        <div class="mb-12 ">
            <button class="btn first">
                Entrar a sala privada
            </button>
        </div>
        @foreach($xats as $xat)
            <div class="movie flex-shrink-0 p-4 md:p-2 border border-gray-800 rounded-md bg-gray-800 text-center mb-2">
                <p class="text-white">{{$xat->nom}}</p>
                <div>
                    <p class="text-white">{{$xat->idioma}}</p>
                    <p class="text-white">{{$xat->nom}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
