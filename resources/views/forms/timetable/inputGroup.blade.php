@php ($a = 1)
@foreach ($openingHours as $openingHour)
    @if ($openingHour->day == $day)
        <div class="col-span-2 sm:col-span-1">
            <label for="lundiTimeOpen{{ $a }}" class="text-black dark:text-white">Ouverture</label>
            <input type="time" name="{{ $day }}TimeOpen{{ $a }}" @if ($openingHour->start)value="{{ $openingHour->start }}" @endif id="{{ $day }}TimeOpen{{ $a }}" class="w-full rounded-xl text-black dark:text-white mt-1 bg-darkblue-200 dark:bg-darkblue-800 border-2 border-blue-700 dark:border-blue-800 focus:border-blue-600 dark:focus:border-blue-500">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="lundiTimeClose{{ $a }}" class="text-black dark:text-white">Fermeture</label>
            <input type="time" name="{{ $day }}TimeClose{{ $a }}" @if ($openingHour->end)value="{{ $openingHour->end }}" @endif id="{{ $day }}TimeClose{{ $a }}" class="w-full rounded-xl text-black dark:text-white mt-1 bg-darkblue-200 dark:bg-darkblue-800 border-2 border-blue-700 dark:border-blue-800 focus:border-blue-600 dark:focus:border-blue-500">
        </div>
    @endif
    @php ($a += 1)
@endforeach
