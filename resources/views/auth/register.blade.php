<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your Attendly account to start tracking attendance and managing work hours.">
    <title>Create account — Attendly</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f8ff] font-sans text-slate-900 antialiased selection:bg-indigo-500 selection:text-white">
    <div class="relative flex min-h-screen flex-col justify-between overflow-hidden">
        <!-- Ambient background glow blobs -->
        <div class="pointer-events-none absolute -right-36 -top-32 size-[34rem] rounded-full bg-indigo-100/70 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-48 left-1/4 size-96 rounded-full bg-violet-100/70 blur-3xl" aria-hidden="true"></div>

        <!-- Top navigation bar -->
        <header class="relative z-10 w-full px-6 py-6 lg:px-8">
            <div class="mx-auto flex max-w-7xl items-center justify-between">
                <a href="{{ route('home') }}" class="group flex items-center gap-2.5 transition" aria-label="Attendly home">
                    <span class="flex size-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-200 transition group-hover:scale-105">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M7 3v3m10-3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="m9 15 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="text-xl font-bold tracking-tight text-slate-900">attendly</span>
                </a>

                <div class="flex items-center gap-3">
                    <span class="hidden text-sm text-slate-500 sm:inline">Already have an account?</span>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/70 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-white hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Sign in
                    </a>
                </div>
            </div>
        </header>

        <!-- Main sign up container -->
        <main class="relative z-10 flex flex-1 items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
            <div class="w-full max-w-md">
                <!-- Card -->
                <div class="rounded-[2rem] border border-white bg-white/90 p-8 shadow-2xl shadow-indigo-200/50 backdrop-blur-xl sm:p-10">
                    <!-- Heading -->
                    <div class="text-center">
                        <div class="mx-auto inline-flex size-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 shadow-inner">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M19 8v6m3-3h-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h1 class="mt-4 text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">Create account</h1>
                        <p class="mt-2 text-sm text-slate-500">Get started with simpler attendance tracking</p>
                    </div>

                    <!-- Error Alert Banner -->
                    @if ($errors->any())
                        <div class="mt-6 flex items-start gap-3 rounded-2xl border border-rose-200 bg-rose-50/80 p-4 text-sm text-rose-800" role="alert">
                            <svg class="mt-0.5 size-5 shrink-0 text-rose-600" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM10 6v5m0 3h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="space-y-1">
                                <p class="font-semibold">Please fix the following issues:</p>
                                <ul class="list-disc pl-4 text-xs">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="mt-7 space-y-4" novalidate>
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Full name
                            </label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400" aria-hidden="true">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.6"/>
                                    </svg>
                                </span>
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Alex Morgan"
                                    class="block w-full rounded-xl border @error('name') border-rose-300 bg-rose-50/20 text-rose-900 focus:border-rose-500 focus:ring-rose-500/20 @else border-slate-200 bg-slate-50/50 text-slate-900 focus:border-indigo-600 focus:bg-white focus:ring-indigo-500/20 @enderror py-3 pl-10 pr-4 text-sm transition placeholder:text-slate-400 focus:outline-none focus:ring-2"
                                    aria-describedby="@error('name') name-error @enderror"
                                >
                            </div>
                            @error('name')
                                <p id="name-error" class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Work email address
                            </label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400" aria-hidden="true">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="alex@company.com"
                                    class="block w-full rounded-xl border @error('email') border-rose-300 bg-rose-50/20 text-rose-900 focus:border-rose-500 focus:ring-rose-500/20 @else border-slate-200 bg-slate-50/50 text-slate-900 focus:border-indigo-600 focus:bg-white focus:ring-indigo-500/20 @enderror py-3 pl-10 pr-4 text-sm transition placeholder:text-slate-400 focus:outline-none focus:ring-2"
                                    aria-describedby="@error('email') email-error @enderror"
                                >
                            </div>
                            @error('email')
                                <p id="email-error" class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Password
                            </label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400" aria-hidden="true">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none">
                                        <rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/>
                                        <path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Minimum 8 characters"
                                    class="block w-full rounded-xl border @error('password') border-rose-300 bg-rose-50/20 text-rose-900 focus:border-rose-500 focus:ring-rose-500/20 @else border-slate-200 bg-slate-50/50 text-slate-900 focus:border-indigo-600 focus:bg-white focus:ring-indigo-500/20 @enderror py-3 pl-10 pr-11 text-sm transition placeholder:text-slate-400 focus:outline-none focus:ring-2"
                                    aria-describedby="@error('password') password-error @enderror"
                                >
                                <button
                                    type="button"
                                    id="toggle-password"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 transition hover:text-slate-600 focus:outline-none"
                                    aria-label="Toggle password visibility"
                                >
                                    <svg id="eye-icon" class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
                                    </svg>
                                    <svg id="eye-slash-icon" class="hidden size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61M2 2l20 20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p id="password-error" class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Confirm password
                            </label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400" aria-hidden="true">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none">
                                        <rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/>
                                        <path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Repeat your password"
                                    class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 py-3 pl-10 pr-11 text-sm text-slate-900 transition placeholder:text-slate-400 focus:border-indigo-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                                >
                                <button
                                    type="button"
                                    id="toggle-password-confirmation"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 transition hover:text-slate-600 focus:outline-none"
                                    aria-label="Toggle confirm password visibility"
                                >
                                    <svg id="eye-icon-confirm" class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
                                    </svg>
                                    <svg id="eye-slash-icon-confirm" class="hidden size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61M2 2l20 20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-3">
                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3.5 text-sm font-semibold text-white shadow-xl shadow-indigo-200 transition hover:-translate-y-0.5 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:translate-y-0"
                            >
                                <span>Create workspace account</span>
                                <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Bottom helper info -->
                    <div class="mt-8 border-t border-slate-100 pt-6 text-center">
                        <p class="text-xs text-slate-500">
                            Already registered?
                            <a href="{{ route('login') }}" class="font-semibold text-indigo-600 transition hover:text-indigo-700">
                                Sign in to your workspace
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="relative z-10 py-6 text-center text-xs text-slate-400">
            <p>© {{ date('Y') }} Attendly. Attendance, made easy.</p>
        </footer>
    </div>

    <!-- Password visibility toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function setupToggle(buttonId, inputId, showIconId, hideIconId) {
                const btn = document.getElementById(buttonId);
                const input = document.getElementById(inputId);
                const showIcon = document.getElementById(showIconId);
                const hideIcon = document.getElementById(hideIconId);

                if (btn && input && showIcon && hideIcon) {
                    btn.addEventListener('click', function () {
                        const isPassword = input.getAttribute('type') === 'password';
                        input.setAttribute('type', isPassword ? 'text' : 'password');
                        showIcon.classList.toggle('hidden', isPassword);
                        hideIcon.classList.toggle('hidden', !isPassword);
                    });
                }
            }

            setupToggle('toggle-password', 'password', 'eye-icon', 'eye-slash-icon');
            setupToggle('toggle-password-confirmation', 'password_confirmation', 'eye-icon-confirm', 'eye-slash-icon-confirm');
        });
    </script>
</body>
</html>
