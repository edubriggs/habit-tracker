<header class="bg-white border-bottom border-b-2 flex item-center justify-between p-4">
    <!-- LOGO -->
    
    <div class="flex items-center gap-2">
        <a href="{{ route('habits.index') }}"class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
            HT
        </a>
        <p>
            Habit Tracker
        </p>
    </div>

    
    <div>

        @auth
            <form class="inline"action="{{ route('auth.logout') }}" method="POST">
                @csrf

                <button type="submit" class="bg-habit-orange p-2 habit-btn habit-shadow-lg hover:opacity-70">
                    Sair
                </button>
                
           
            </form>
        
        @endauth
        

        @guest
            <div class="flex gap-2">
                <a href="{{ route('site.register') }}" class=" p-2 habit-btn habit-shadow-lg hover:opacity-70">
                    Cadastrar
                </a>
                <a href="{{ route('site.login') }}" class="bg-habit-orange p-2 habit-btn habit-shadow-lg hover:opacity-70">
                    Logar
                </a>
            </div>
            
        @endguest
    </div>
</header>