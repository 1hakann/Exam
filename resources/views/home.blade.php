<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($isExamAssigned)
                @foreach ($quizzes as $quiz)
                    
                <div class="card-body">
                    <p><h3>{{$quiz->name}}</h3></p>
                    <p>Sınav Hakkında: {{$quiz->description}}</p>
                    <p>Sınav Süresi: {{$quiz->minutes}}</p>
                    <p>Soru Sayısı: {{$quiz->questions->count()}}</p>

                </div>
                @endforeach
                @else
                <p>Herhangi Bir Sınava Atanmadınız.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
