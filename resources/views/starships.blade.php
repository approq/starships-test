<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
@foreach($starships as $starship)
    <div style="border-bottom: 2px solid black">
        <p>Name: {{$starship->name}}</p>
        <p>Model: {{$starship->model}}</p>
        <p>Crew: {{$starship->crew}}</p>
        <p>Cargo capacity: {{$starship->cargo_capacity}} kg</p>
        <p>Max atmosphering speed: {{$starship->cargo_capacity}}</p>

        @if($starship->id !== $fastestStarship->id)
            <p>Slower on: {{$starship->maxatmospheringSpeedSlower($fastestStarship->max_atmosphering_speed ?? 0)}} %</p>
        @endif

        @if($starship->pilots->count() > 0)
            <p>Pilots:</p>
            <div style="margin-left: 20px">
                @foreach($starship->pilots as $pilot)
                    <p>Name: {{$pilot->name}}</p>
                    <p @if(!$loop->last)style="border-bottom: 1px solid black"@endif>Height: {{$pilot->height}}</p>
                @endforeach
            </div>
        @endif
    </div>
@endforeach
</body>
</html>
