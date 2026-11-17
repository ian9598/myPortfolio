<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('portfolio.personal.name') }} — {{ config('portfolio.personal.title') }}. Portfolio showcasing healthcare software development, HL7 integrations, and Laravel expertise.">

    <title>{{ config('portfolio.personal.name') }} | {{ config('portfolio.personal.title') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-slate-950 text-slate-200 font-sans antialiased">

    <!-- ════════════════════════════════════════════════════════════════════
         NAVIGATION
         ════════════════════════════════════════════════════════════════════ -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="#hero" class="text-xl font-bold gradient-text">
                    {{ collect(explode(' ', config('portfolio.personal.short_name')))->map(fn($w) => $w[0])->join('') }}
                </a>

                <!-- Desktop links -->
                <div class="hidden md:flex items-center gap-8">
                    @foreach (['about' => 'About', 'skills' => 'Skills', 'experience' => 'Experience', 'projects' => 'Projects', 'education' => 'Education', 'contact' => 'Contact'] as $slug => $label)
                        <a href="#{{ $slug }}" class="text-slate-400 hover:text-emerald-400 transition-colors text-sm font-medium">{{ $label }}</a>
                    @endforeach
                </div>

                <!-- Mobile hamburger -->
                <button id="mobile-menu-btn" class="md:hidden text-slate-400 hover:text-emerald-400 transition-colors" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
                @foreach (['about' => 'About', 'skills' => 'Skills', 'experience' => 'Experience', 'projects' => 'Projects', 'education' => 'Education', 'contact' => 'Contact'] as $slug => $label)
                    <a href="#{{ $slug }}" class="block py-2 px-4 text-slate-400 hover:text-emerald-400 hover:bg-slate-800/50 rounded-lg transition-colors text-sm font-medium">{{ $label }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- ════════════════════════════════════════════════════════════════════
         HERO
         ════════════════════════════════════════════════════════════════════ -->
    <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Gradient orbs background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 -left-32 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-indigo-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-emerald-400 font-medium mb-4 tracking-wide uppercase text-sm">Hello, I'm</p>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold mb-6">
                <span class="gradient-text">{{ config('portfolio.personal.name') }}</span>
            </h1>
            <h2 class="text-xl sm:text-2xl lg:text-3xl text-slate-300 font-light mb-6">
                {{ config('portfolio.personal.title') }}
            </h2>
            <p class="text-slate-400 max-w-2xl mx-auto mb-10 text-lg leading-relaxed">
                {{ config('portfolio.personal.tagline') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#projects" class="inline-flex items-center gap-2 px-8 py-3 bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-semibold rounded-xl transition-all hover:shadow-lg hover:shadow-emerald-500/25">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    View My Work
                </a>
                <a href="{{ route('resume.download') }}" class="inline-flex items-center gap-2 px-8 py-3 border border-slate-600 hover:border-emerald-400 text-slate-300 hover:text-emerald-400 font-semibold rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Download Resume
                </a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         ABOUT
         ════════════════════════════════════════════════════════════════════ -->
    <section id="about" class="py-20 lg:py-28">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">About Me</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <!-- Summary -->
                <div class="reveal">
                    <p class="text-slate-400 leading-relaxed text-lg mb-8">
                        {{ config('portfolio.personal.summary') }}
                    </p>

                    <!-- Quick contact info -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 text-slate-400">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ config('portfolio.personal.location') }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-slate-400">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ config('portfolio.personal.email') }}" class="hover:text-emerald-400 transition-colors">{{ config('portfolio.personal.email') }}</a>
                        </div>
                        <div class="flex items-center gap-3 text-slate-400">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <a href="{{ config('portfolio.personal.linkedin') }}" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-400 transition-colors">{{ config('portfolio.personal.linkedin_display') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Quick facts card -->
                <div class="reveal bg-slate-900/50 border border-slate-800 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold mb-6 text-slate-100">Quick Facts</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-slate-800/50 rounded-xl">
                            <p class="text-2xl font-bold text-emerald-400">3+</p>
                            <p class="text-sm text-slate-400 mt-1">Years Experience</p>
                        </div>
                        <div class="text-center p-4 bg-slate-800/50 rounded-xl">
                            <p class="text-2xl font-bold text-cyan-400">3.66</p>
                            <p class="text-sm text-slate-400 mt-1">Degree CGPA</p>
                        </div>
                        <div class="text-center p-4 bg-slate-800/50 rounded-xl">
                            <p class="text-2xl font-bold text-indigo-400">6</p>
                            <p class="text-sm text-slate-400 mt-1">Certifications & Awards</p>
                        </div>
                        <div class="text-center p-4 bg-slate-800/50 rounded-xl">
                            <p class="text-2xl font-bold text-amber-400">7As</p>
                            <p class="text-sm text-slate-400 mt-1">SPM Results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         SKILLS
         ════════════════════════════════════════════════════════════════════ -->
    <section id="skills" class="py-20 lg:py-28 bg-slate-900/30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Skills & Languages</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Technical skills -->
                <div class="reveal">
                    <h3 class="text-xl font-semibold mb-6 text-slate-100">Technical Skills</h3>
                    <div class="space-y-6">
                        @foreach (config('portfolio.skills') as $group)
                            <div>
                                <h4 class="text-sm font-semibold text-slate-300 uppercase tracking-wider mb-3">{{ $group['group'] }}</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($group['items'] as $item)
                                        <span class="px-3 py-1.5 text-sm font-medium rounded-lg bg-slate-800/70 text-slate-300 border border-slate-700/60 hover:border-emerald-500/50 hover:text-emerald-400 transition-colors">{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Languages -->
                <div class="reveal">
                    <h3 class="text-xl font-semibold mb-6 text-slate-100">Languages</h3>
                    <div class="space-y-5">
                        @foreach (config('portfolio.languages') as $lang)
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-300 font-medium">{{ $lang['name'] }}</span>
                                    <span class="text-sm text-slate-500">{{ $lang['level'] }}</span>
                                </div>
                                <div class="w-full bg-slate-800 rounded-full h-2.5">
                                    @php
                                        $width = match($lang['level']) {
                                            'Native' => '95%',
                                            'Intermediate' => '65%',
                                            'Basic' => '40%',
                                            default => '50%',
                                        };
                                        $color = match($lang['level']) {
                                            'Native' => 'bg-emerald-500',
                                            'Intermediate' => 'bg-cyan-500',
                                            'Basic' => 'bg-indigo-500',
                                            default => 'bg-slate-600',
                                        };
                                    @endphp
                                    <div class="{{ $color }} h-2.5 rounded-full transition-all duration-1000" style="width: {{ $width }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         EXPERIENCE
         ════════════════════════════════════════════════════════════════════ -->
    <section id="experience" class="py-20 lg:py-28">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Experience</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="relative pl-12 md:pl-16">
                <!-- Timeline vertical line -->
                <div class="timeline-line"></div>

                @foreach (config('portfolio.experiences') as $index => $exp)
                    <div class="reveal mb-12 last:mb-0 relative">
                        <!-- Timeline dot -->
                        <div class="absolute -left-12 md:-left-16 top-1 w-10 h-10 rounded-full bg-slate-800 border-2 border-emerald-500 flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>

                        <!-- Card -->
                        <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6 lg:p-8 card-hover">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-100">{{ $exp['role'] }}</h3>
                                    <p class="text-emerald-400 font-medium">{{ $exp['company'] }}</p>
                                </div>
                                <span class="text-sm text-slate-500 mt-2 sm:mt-0">{{ $exp['period'] }}</span>
                            </div>

                            @if (!empty($exp['highlights']))
                                <ul class="space-y-2 mb-4">
                                    @foreach ($exp['highlights'] as $point)
                                        <li class="flex items-start gap-3 text-slate-400">
                                            <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @foreach ($exp['sub_sections'] as $sub)
                                <div class="mt-4 pt-4 border-t border-slate-800">
                                    <h4 class="text-base font-semibold text-slate-200 mb-3">{{ $sub['title'] }}</h4>
                                    <ul class="space-y-2">
                                        @foreach ($sub['points'] as $point)
                                            <li class="flex items-start gap-3 text-slate-400 text-sm">
                                                <svg class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         PROJECTS
         ════════════════════════════════════════════════════════════════════ -->
    <section id="projects" class="py-20 lg:py-28 bg-slate-900/30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Projects</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @foreach (config('portfolio.projects') as $project)
                    <div class="reveal bg-slate-900/50 border border-slate-800 rounded-2xl p-6 lg:p-8 card-hover">
                        <h3 class="text-xl font-semibold text-slate-100 mb-3">{{ $project['title'] }}</h3>
                        <p class="text-slate-400 mb-5 leading-relaxed">{{ $project['description'] }}</p>

                        <h4 class="text-sm font-semibold text-slate-300 uppercase tracking-wider mb-3">Key Features</h4>
                        <ul class="space-y-2 mb-5">
                            @foreach ($project['features'] as $feature)
                                <li class="flex items-start gap-2 text-slate-400 text-sm">
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project['tags'] as $tag)
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         EDUCATION
         ════════════════════════════════════════════════════════════════════ -->
    <section id="education" class="py-20 lg:py-28">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Education</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach (config('portfolio.education') as $edu)
                    <div class="reveal bg-slate-900/50 border border-slate-800 rounded-2xl p-6 card-hover text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-emerald-500/20 to-cyan-500/20 flex items-center justify-center">
                            <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-100 mb-1">{{ $edu['degree'] }}</h3>
                        <p class="text-emerald-400 text-sm mb-1">{{ $edu['institution'] }}</p>
                        <p class="text-slate-500 text-sm mb-2">{{ $edu['period'] }}</p>
                        <p class="text-cyan-400 font-semibold text-sm">{{ $edu['result'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         CERTIFICATIONS & AWARDS
         ════════════════════════════════════════════════════════════════════ -->
    <section id="certs" class="py-20 lg:py-28 bg-slate-900/30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Certifications & Awards</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-12 rounded-full"></div>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                @foreach (config('portfolio.certifications') as $cert)
                    <div class="reveal flex items-start gap-3 bg-slate-900/50 border border-slate-800 rounded-xl p-4 card-hover">
                        @if ($cert['year'])
                            <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full mt-0.5 shrink-0">{{ $cert['year'] }}</span>
                        @else
                            <span class="mt-0.5 shrink-0 flex items-center justify-center w-9 h-9 rounded-full bg-amber-500/10">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            </span>
                        @endif
                        <p class="text-slate-400 text-sm">{{ $cert['title'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         CONTACT
         ════════════════════════════════════════════════════════════════════ -->
    <section id="contact" class="py-20 lg:py-28">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-center mb-2">
                    <span class="gradient-text">Get In Touch</span>
                </h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto mb-4 rounded-full"></div>
                <p class="text-slate-400 text-center max-w-xl mx-auto mb-12">
                    Have a question or want to work together? Feel free to reach out!
                </p>
            </div>

            <!-- Success message -->
            @if (session('success'))
                <div class="reveal max-w-2xl mx-auto mb-8 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="max-w-2xl mx-auto reveal">
                <form action="{{ route('contact.send') }}#contact" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Name</label>
                            <input
                                type="text" id="name" name="name" required
                                value="{{ old('name') }}"
                                class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                                placeholder="Your name"
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                            <input
                                type="email" id="email" name="email" required
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                                placeholder="your@email.com"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-slate-300 mb-2">Subject</label>
                        <input
                            type="text" id="subject" name="subject" required
                            value="{{ old('subject') }}"
                            class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                            placeholder="What's this about?"
                        >
                        @error('subject')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-300 mb-2">Message</label>
                        <textarea
                            id="message" name="message" required rows="5"
                            class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors resize-y"
                            placeholder="Your message..."
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-semibold rounded-xl transition-all hover:shadow-lg hover:shadow-emerald-500/25 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════════
         FOOTER
         ════════════════════════════════════════════════════════════════════ -->
    <footer class="py-12 bg-slate-900/50 border-t border-slate-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <!-- Logo -->
                <a href="#hero" class="text-2xl font-bold gradient-text">
                    {{ collect(explode(' ', config('portfolio.personal.short_name')))->map(fn($w) => $w[0])->join('') }}
                </a>

                <!-- Quick links -->
                <div class="flex items-center gap-6 text-sm text-slate-500">
                    <a href="#about" class="hover:text-emerald-400 transition-colors">About</a>
                    <a href="#experience" class="hover:text-emerald-400 transition-colors">Experience</a>
                    <a href="#projects" class="hover:text-emerald-400 transition-colors">Projects</a>
                    <a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a>
                </div>

                <!-- Social -->
                <div class="flex items-center gap-4">
                    <a href="mailto:{{ config('portfolio.personal.email') }}" class="text-slate-500 hover:text-emerald-400 transition-colors" aria-label="Email">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                    <a href="{{ config('portfolio.personal.linkedin') }}" target="_blank" rel="noopener noreferrer" class="text-slate-500 hover:text-emerald-400 transition-colors" aria-label="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-slate-800 text-center text-sm text-slate-600">
                &copy; {{ date('Y') }} {{ config('portfolio.personal.name') }}. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
