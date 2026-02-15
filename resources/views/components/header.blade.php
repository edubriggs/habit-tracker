<header class="bg-white border-bottom border-b-2 flex item-center justify-between p-4">
    <!-- LOGO -->
    
    <div>
        LOGO
    </div>
    
    <div>
        
        github

        @auth
            <form class="inline"action="{{ route('auth.logout') }}" method="POST">
                @csrf

                <button type="submit" class="bg-white p-2 border-2 hover:opacity-70">
                    Sair
                </button>
                
           
            </form>
        
        @endauth
        

        @guest
            <a href="{{ route('site.login') }}" class="bg-white p-2 border-2 hover:opacity-70">
                LOGIN
            </a>
            
        @endguest
    </div>
</header>