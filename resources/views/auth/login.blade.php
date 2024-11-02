<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management System - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#6A9C89',
                        'secondary': '#C4DAD2',
                        'dark': '#16423C',
                        'light': '#E9EFEC',
                    }
                }
            }
        }
    </script>
    <style>
        .animated-title {
            background: linear-gradient(
                to right,
                #16423C 20%,
                #6A9C89 30%,
                #6A9C89 70%,
                #16423C 80%
            );
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: textShine 4s ease-in-out infinite;
            position: relative;
        }

        .animated-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 2px;
            background: #6A9C89;
        }

        @keyframes textShine {
            0% {
                background-position: 200% center;
            }
            100% {
                background-position: -200% center;
            }
        }
        .blueprint-pattern {
            background-image: radial-gradient(#16423C 1px, transparent 1px);
            background-size: 20px 20px;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        body {
            background: linear-gradient(to bottom right, #6A9C89, #C4DAD2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all hover:scale-[1.02]">
        <div class="flex flex-col md:flex-row">
            <!-- Left Side - Enhanced Construction Theme -->
            <div class="md:w-1/2 bg-primary p-8 text-dark flex flex-col justify-center items-center relative overflow-hidden">
                <!-- Blueprint Pattern Background -->
                <div class="absolute inset-0 blueprint-pattern opacity-10"></div>
                
                <!-- Construction Elements Container -->
                <div class="relative z-10 mb-8 flex flex-col items-center">
                    <!-- Animated Construction Icons -->
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <!-- Crane Icon -->
                        <div class="float-animation bg-dark/10 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 20h20M4 20V4l8-2v18M14 20V8l6-2v14"/>
                            </svg>
                        </div>
                        <!-- Helmet Icon -->
                        <div class="float-animation bg-dark/10 p-3 rounded-lg" style="animation-delay: 0.2s">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 4C7.58172 4 4 7.58172 4 12V20H20V12C20 7.58172 16.4183 4 12 4Z"/>
                                <path d="M9 14H15"/>
                            </svg>
                        </div>
                        <!-- Tools Icon -->
                        <div class="float-animation bg-dark/10 p-3 rounded-lg" style="animation-delay: 0.4s">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Main Building Icon -->
                    <div class="bg-dark/20 p-6 rounded-full mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-4xl font-bold mb-4 text-center text-dark">Welcome Back!</h2>
                <p class="text-dark/80 text-center text-lg">
                    Building Tomorrow's Success Today
                </p>

                <!-- Construction-themed Footer -->
                <div class="mt-8 space-y-2 text-dark/70 text-center">
                    <p class="flex items-center justify-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Safety First
                    </p>
                    <p class="flex items-center justify-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Building Excellence
                    </p>
                </div>
            </div>

            <!-- Right Side - Login Form (kept mostly the same with minor color updates) -->
            <div class="md:w-1/2 p-8 login-form-glass">
            <h3 class="text-3xl font-bold text-dark mb-8 animated-title">
                    OeETVR Online Services Portal
                </h3>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-dark">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="pl-10 block w-full px-4 py-3 border border-secondary rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all
                                @error('email') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Enter your email">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-dark">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a6 6 0 016 6v3h1a1 1 0 010 2H3a1 1 0 010-2h1V8a6 6 0 016-6zm-3 9v1h6v-1a3 3 0 00-6 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="pl-10 block w-full px-4 py-3 border border-secondary rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all
                                @error('password') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Enter your password">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-secondary rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-dark">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>