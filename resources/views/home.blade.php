<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simpler way to manage team attendance, track work hours, and stay in sync.">
    <title>Attendly — Attendance, made easy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-slate-900 antialiased">
    <header class="relative overflow-hidden bg-[#f7f8ff]">
        <nav class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8" aria-label="Main navigation">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5" aria-label="Attendly home">
                <span class="flex size-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-200">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M7 3v3m10-3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="m9 15 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="text-xl font-bold tracking-tight text-slate-900">attendly</span>
            </a>

            <div class="hidden items-center gap-9 text-sm font-medium text-slate-600 md:flex">
                <a href="#features" class="transition hover:text-indigo-600">Features</a>
                <a href="#how-it-works" class="transition hover:text-indigo-600">How it works</a>
                <a href="#benefits" class="transition hover:text-indigo-600">Benefits</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <div class="flex items-center gap-3">
                        <span class="hidden text-sm font-medium text-slate-700 sm:inline-block">Hi, {{ Auth::user()->name }} 👋</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/70 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                                Log out
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/70 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-white hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Get started
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                @endauth
            </div>
        </nav>

        <div class="pointer-events-none absolute -right-36 -top-32 size-[34rem] rounded-full bg-indigo-100/70 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-48 left-1/4 size-96 rounded-full bg-violet-100/70 blur-3xl"></div>

        <main class="relative mx-auto grid max-w-7xl items-center gap-14 px-6 pb-20 pt-10 lg:grid-cols-[1fr_0.95fr] lg:px-8 lg:pb-28 lg:pt-14">
            <div class="max-w-2xl">
                <h1 class="max-w-xl text-5xl font-bold leading-[1.08] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Make every workday
                    <span class="bg-gradient-to-r from-indigo-600 to-violet-500 bg-clip-text text-transparent">count.</span>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">
                    Attendance that just works. Give your team a simple way to clock in, and give yourself a clear view of every workday.
                </p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3.5 text-base font-semibold text-white shadow-xl shadow-indigo-200 transition hover:-translate-y-0.5 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Start tracking attendance
                        <svg class="size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="#how-it-works" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white/70 px-6 py-3.5 text-base font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-white">
                        See how it works
                    </a>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-xl lg:ml-auto">
                <div class="rounded-[2rem] border border-white bg-white p-3 shadow-2xl shadow-indigo-200/60 sm:p-5">
                    <div class="rounded-[1.5rem] bg-slate-50 p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Good morning, Alex 👋</p>
                                <p class="mt-1 text-xs text-slate-500">{{ now()->format('l, F j, Y') }}</p>
                            </div>
                            <button type="button" class="flex size-10 items-center justify-center rounded-full bg-white text-slate-500 shadow-sm" aria-label="Notifications">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9m-8 12a2 2 0 0 0 4 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                        </div>

                        <div class="mt-6 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 p-5 text-white shadow-lg shadow-indigo-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-indigo-100">Your workday</span>
                                <span class="rounded-full bg-white/15 px-2.5 py-1 text-xs font-medium">Today</span>
                            </div>
                            <div class="mt-4 flex items-end justify-between gap-4">
                                <div>
                                    <p class="text-3xl font-bold tracking-tight">09:02 AM</p>
                                    <p class="mt-1 text-sm text-indigo-100">Checked in · On time</p>
                                </div>
                                <span class="flex size-12 items-center justify-center rounded-2xl bg-white/15">
                                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4l2.5 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-white/20">
                                <div class="h-full w-2/5 rounded-full bg-white"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-indigo-100"><span>3h 12m worked</span><span>8h goal</span></div>
                        </div>

                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <div class="rounded-2xl border border-slate-100 bg-white p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-medium text-slate-500">This week</span>
                                    <span class="flex size-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M3 14.5 7 10l3 2.5L16.5 5M12 5h4.5v4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                                <p class="mt-3 text-2xl font-bold text-slate-900">32.5<span class="ml-1 text-sm font-medium text-slate-400">hrs</span></p>
                                <p class="mt-1 text-xs text-emerald-600">Looking good</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-white p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-medium text-slate-500">Attendance</span>
                                    <span class="flex size-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2.5v7l4 2.5m3.5-2a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                                <p class="mt-3 text-2xl font-bold text-slate-900">98<span class="ml-0.5 text-sm font-medium text-slate-400">%</span></p>
                                <p class="mt-1 text-xs text-slate-500">You’re on a roll</p>
                            </div>
                        </div>

                        <div class="mt-5 rounded-2xl border border-slate-100 bg-white p-4">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-900">Team today</p>
                                <a href="#features" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">View all</a>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex -space-x-2">
                                    <span class="flex size-8 items-center justify-center rounded-full border-2 border-white bg-rose-100 text-[10px] font-bold text-rose-700">JM</span>
                                    <span class="flex size-8 items-center justify-center rounded-full border-2 border-white bg-amber-100 text-[10px] font-bold text-amber-700">AK</span>
                                    <span class="flex size-8 items-center justify-center rounded-full border-2 border-white bg-sky-100 text-[10px] font-bold text-sky-700">SL</span>
                                    <span class="flex size-8 items-center justify-center rounded-full border-2 border-white bg-violet-100 text-[10px] font-bold text-violet-700">+8</span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-700">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    11 of 12 present
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </header>

    <section id="benefits" class="border-y border-slate-100 bg-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-6 py-9 sm:grid-cols-3 lg:px-8">
            <div class="flex items-center justify-center gap-4 sm:justify-start">
                <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 7h8m-8 4h8m-8 4h4m-7 6h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H7L3 7v12a2 2 0 0 0 2 2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div>
                    <p class="text-2xl font-bold tracking-tight text-slate-900">Less busywork</p>
                    <p class="mt-1 text-sm text-slate-500">Simple check-ins, without the spreadsheets.</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 border-slate-100 sm:border-x sm:px-8 sm:justify-start">
                <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V5m0 14h16M8 15v-3m4 3V7m4 8v-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div>
                    <p class="text-2xl font-bold tracking-tight text-slate-900">More clarity</p>
                    <p class="mt-1 text-sm text-slate-500">Know who’s in, wherever you are.</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 sm:pl-8 sm:justify-start">
                <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m6-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm10 10v-2a4 4 0 0 0-3-3.87m-1-11.9a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div>
                    <p class="text-2xl font-bold tracking-tight text-slate-900">Happier teams</p>
                    <p class="mt-1 text-sm text-slate-500">A smoother routine for every workday.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Built for your workday</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Everything in sync, all in one place.</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">Spend less time chasing timesheets and more time doing the work that matters.</p>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
                <span class="flex size-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3m10-3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="m9 15 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h3 class="mt-6 text-lg font-bold text-slate-900">Effortless check-ins</h3>
                <p class="mt-2 leading-7 text-slate-600">Make starting and ending the day a breeze with a clear, easy-to-use attendance flow.</p>
            </article>
            <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
                <span class="flex size-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V5m0 14h16M8 15v-3m4 3V7m4 8v-5m4 5V9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h3 class="mt-6 text-lg font-bold text-slate-900">Real-time overview</h3>
                <p class="mt-2 leading-7 text-slate-600">Get a clear picture of your team’s attendance and hours, all from one dashboard.</p>
            </article>
            <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
                <span class="flex size-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4l2.5 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h3 class="mt-6 text-lg font-bold text-slate-900">Accurate work hours</h3>
                <p class="mt-2 leading-7 text-slate-600">Keep reliable records of hours worked, so your team and your reports stay on track.</p>
            </article>
        </div>
    </section>

    <section id="how-it-works" class="bg-[#f7f8ff]">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 lg:grid-cols-2 lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Simple by design</p>
                <h2 class="mt-4 max-w-lg text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">From check-in to insights in a few clicks.</h2>
                <p class="mt-4 max-w-xl text-lg leading-8 text-slate-600">No complicated setup or confusing workflows. Attendly keeps attendance simple for everyone on your team.</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-slate-100 bg-white p-5">
                    <span class="flex size-9 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white">1</span>
                    <h3 class="mt-5 font-bold text-slate-900">Set up your team</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Bring everyone into one shared workspace.</p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-white p-5">
                    <span class="flex size-9 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white">2</span>
                    <h3 class="mt-5 font-bold text-slate-900">Check in daily</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Your team logs attendance in just a moment.</p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-white p-5">
                    <span class="flex size-9 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white">3</span>
                    <h3 class="mt-5 font-bold text-slate-900">Stay up to date</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">See your attendance picture at a glance.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="get-started" class="px-6 py-20 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-5xl overflow-hidden rounded-[2rem] bg-gradient-to-r from-indigo-600 to-violet-600 px-7 py-12 text-center shadow-xl shadow-indigo-200 sm:px-12 sm:py-16">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-100">A smoother workday starts here</p>
            <h2 class="mx-auto mt-4 max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to make attendance easier?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-indigo-100">Bring your team together with attendance tracking that feels effortless.</p>
            <a href="#features" class="mt-8 inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 font-semibold text-indigo-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                Explore the features
                <svg class="size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </section>

    <footer class="border-t border-slate-100">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-6 py-7 text-sm text-slate-500 sm:flex-row lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-slate-800">
                <span class="flex size-7 items-center justify-center rounded-lg bg-indigo-600 text-white">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3m10-3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="m9 15 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                attendly
            </a>
            <p>© {{ date('Y') }} Attendly. Attendance, made easy.</p>
        </div>
    </footer>
</body>
</html>
