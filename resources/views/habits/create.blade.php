<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">

    <h1 class="font-bold text-2xl text-center">Cadastrar novo Hábito</h1>

    <section class="habit-shadow-lg bg-white max-w-[600px] mx-auto p-10 pb-6 mt-4">

        <form action="{{ route('habits.store') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="flex flex-col gap-4 mb-4">
            <label for="name" class="text-xl font-bold">
                Nome do Hábito
            </label>

            <input
                type="text"
                name="name"
                placeholder="Ex: fazer 15 flexões"
                class="bg-white habit-shadow p-2 border-2 @error('name') border-red-500 @enderror"
            >
            @error('name')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            </div>
            <button type="submit" class="habit-btn habit-shadow-lg bg-habit-orange border-2 mt-2 p-2 hover:opacity-85">
            Cadastrar Hábito
            </button>
        </form>

    </section>
  </main>

</x-layout>