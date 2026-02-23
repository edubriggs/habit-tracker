<x-layout>
  <main class="py-10">

    <h1>Cadastrar novo Hábito</h1>

    <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 border-2 mt-4">

        <form action="{{ route('habit.store') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="flex flex-col gap-4 mb-4">
            <label for="name">
                Nome do Hábito
            </label>

            <input
                type="text"
                name="name"
                placeholder="Ex: fazer 15 flexões"
                class="bg-white p-2 border-2 @error('name') border-red-500 @enderror"
            >
            @error('name')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            </div>
            <button type="submit" class="bg-white border-2 p-2 hover:opacity-85">
            Cadastrar Hábito
            </button>
        </form>

    </section>
  </main>

</x-layout>