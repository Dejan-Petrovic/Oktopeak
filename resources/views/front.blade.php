<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: #F7F8F3
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #F7444E;
            position: sticky;
            top: 0;
        }
        li {
            float: left;
            width: 15%;
        }

        li a {
            display: block;
            color: #F7F8F3;
            text-align: center;
            padding: 24px 26px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #002C3E;
        }
        .aktivna{
            background-color: #002C3E;
        }
        .karta{
            background-color: #FFFFFF;
            max-width: 370px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: auto;
        }

        .kolona{
            display: inline-block;
            width: 30%;
            padding: 40px 20px;
        }

        .opis{
            text-align: center;
            font-size: 19px;
            color: #002C3E;
        }

        textarea {
            resize: none;
        }
    </style>
	<title>Pocetna</title>
</head>
<body>
    <div>
        <ul>
            <li><a class="aktivna" href="#pocetna">POČETNA</a></li>
            <li><a href="#akcije">AKCIJE</a></li>
            <li><a href="#kontakt">KONTAKT</a></li>
            <li><a href="/admin/comments">ADMIN</a></li>
        </ul> 
    </div>

	<div class="red">
        @foreach ($products as $product)
            <div class="kolona">
                <div class="karta">
                    <img src="{{ $product->image }}" alt="slika1" style="width: 300px; height: 300px">
                    <h2>{{ $product->title }}</h2>

                    <p class="opis">
                        {{ Str::limit($product->description, 50) }}
                    <p>

                </div>
            </div>
        @endforeach

    </div>




    <div>
        <h3>Dodaj komentar</h3>
        <form action="{{ url('/comments') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Ime</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="text">Komentar</label>
                <textarea name="text" class="form-control" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">POSALJI</button>
        </form>

        <h3>Komentari:</h3>
        @foreach ($comments as $comment)
            <div class="mb-3">
                <strong>{{ $comment->name }}</strong> ({{ $comment->email }}):
                <p>{{ $comment->text }}</p>
            </div>
        @endforeach
    </div>
