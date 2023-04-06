<!-- Vista para mostrar una pregunta con opciones de respuesta -->
<div class="question">
    <h2>{{ $question->title }}</h2>
    @if ($question->type == 'Single Choice')
        @foreach ($question->options as $option)
            <label>
                <input type="radio" name="answer" value="{{ $option->id }}">
                {{ $option->text }}
            </label>
        @endforeach
    @elseif ($question->type == 'Multiple Choice')
        @foreach ($question->options as $option)
            <label>
                <input type="checkbox" name="answer[]" value="{{ $option->id }}">
                {{ $option->text }}
            </label>
        @endforeach
    @else
        <textarea name="answer"></textarea>
    @endif
</div>

<!-- Vista para mostrar el resultado del cuestionario -->
<div class="result">
    <h2>Resultado del cuestionario</h2>
    @foreach ($questions as $question)
        <p>{{ $question->title }}: {{ $question->answers_count }} respuestas</p>
    @endforeach
</div>
