<x-layout>
  <main class="py-10">
    <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 mt-4 habit-shadow-lg">

      <h1 class="font-bold text-3xl">Faça login</h1>

      <p>Coloque seus dados para acessar</p>
      
      <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col">
        
        @csrf
        <div class="flex flex-col gap-4 mb-4">
          <label for="email">
            Email
          </label>

          <input
            type="email"
            name="email"
            placeholder="seu@email.com"
            class="bg-white p-2 habit-shadow @error('email') border-red-500 @enderror"
          >
          @error('email')
            <p class="text-red-500 text-sm">
                  {{$message}}
            </p>
          @enderror
        </div>

        <div class="flex flex-col gap-4 mb-4">
          <label for="password">Senha</label>
          <input
            type="password"
            name="password"
            placeholder="********"
            class="bg-white p-2 habit-shadow @error('password') border-red-500 @enderror"
          >
          @error('password')
            <p class="text-red-500 text-sm">
                  {{$message}}
            </p>
          @enderror
        </div>
        <button
          type="submit"
          class="p-2 bg-habit-orange hover:opacity-80 habit-shadow-lg"
        >
          Entrar
        </button>
      </form>
      <p class="text-center mt-4">
        Ainda não tem uma conta? <a href="{{ route('site.register') }}" class="underline hover:opacity-60 transition">Crie sua conta</a>
      </p>
      
    </section>
  </main>
</x-layout>