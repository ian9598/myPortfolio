<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('portfolio.personal.name') }} is a software engineer in Shah Alam, Malaysia, working on hospital management systems, HL7 integrations and clinical APIs.">
    <meta name="author" content="{{ config('portfolio.personal.name') }}">
    <meta name="color-scheme" content="light">

    <title>{{ config('portfolio.personal.name') }} | {{ config('portfolio.personal.title') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&family=Newsreader:opsz,wght@6..72,400;6..72,500;6..72,600&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans text-ink antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 focus:z-50 focus:bg-ink focus:px-4 focus:py-2 focus:text-paper">
        Skip to content
    </a>

    <header id="site-header" class="sticky top-0 z-40 border-b border-rule bg-paper/95 backdrop-blur-[2px]">
        <div class="mx-auto flex max-w-5xl items-baseline justify-between px-5 py-3 sm:px-8">
            <a href="#top" class="font-serif text-lg font-medium tracking-tight text-ink">
                {{ config('portfolio.personal.short_name') }}
            </a>

            <nav aria-label="Sections" class="hidden items-baseline gap-6 md:flex">
                @foreach (['about' => 'About', 'skills' => 'Skills', 'experience' => 'Experience', 'projects' => 'Projects', 'education' => 'Education', 'contact' => 'Contact'] as $slug => $label)
                    <a href="#{{ $slug }}" class="link-ink text-sm text-muted">{{ $label }}</a>
                @endforeach
                <a href="{{ route('resume.download') }}" class="link-ink text-sm text-accent-deep">Resume</a>
            </nav>

            <button
                id="nav-toggle"
                type="button"
                class="flex items-center gap-2 text-sm text-muted md:hidden"
                aria-expanded="false"
                aria-controls="nav-panel"
            >
                Menu
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
            </button>
        </div>

        <div id="nav-panel" class="hidden border-t border-rule md:hidden">
            <nav aria-label="Sections" class="mx-auto flex max-w-5xl flex-col px-5 py-2">
                @foreach (['about' => 'About', 'skills' => 'Skills', 'experience' => 'Experience', 'projects' => 'Projects', 'education' => 'Education', 'contact' => 'Contact'] as $slug => $label)
                    <a href="#{{ $slug }}" class="border-b border-rule py-3 text-sm text-muted last:border-0">{{ $label }}</a>
                @endforeach
                <a href="{{ route('resume.download') }}" class="py-3 text-sm text-accent-deep">Resume</a>
            </nav>
        </div>
    </header>

    <main id="main">
        {{-- MASTHEAD --}}
        <section id="top" class="mx-auto max-w-5xl px-5 pt-14 pb-12 sm:px-8 sm:pt-20">
            <div class="grid gap-10 md:grid-cols-[1fr_auto] md:items-start md:gap-16">
                <div>
                    <p class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">
                        Portfolio, revised November 2026
                    </p>

                    <h1 class="mt-5 font-serif text-[2.6rem] leading-[1.02] tracking-tight text-ink sm:text-6xl lg:text-7xl">
                        {{ config('portfolio.personal.name') }}
                    </h1>

                    <p class="mt-4 text-lg text-muted">{{ config('portfolio.personal.title') }}, {{ config('portfolio.personal.location') }}</p>

                    <p class="mt-6 max-w-[46ch] text-[17px] leading-relaxed text-ink">
                        I build the systems hospitals run on: laboratory and radiology workflows, medical records, and the HL7 links that carry orders and results between them.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3">
                        <a href="#projects" class="inline-flex min-h-11 items-center bg-accent px-5 text-sm font-medium text-white transition-colors hover:bg-accent-deep">
                            See selected work
                        </a>
                        <a href="{{ route('resume.download') }}" class="link-ink text-sm text-accent-deep">
                            Download resume (PDF)
                        </a>
                    </div>
                </div>

                <figure class="w-[152px] shrink-0">
                    <img
                        src="{{ asset('images/portrait.jpg') }}"
                        width="264"
                        height="298"
                        alt="Portrait of {{ config('portfolio.personal.name') }}"
                        fetchpriority="high"
                        class="block h-auto w-full"
                    >
                </figure>
            </div>

            {{-- Ledger strip replacing the usual stat cards --}}
            <dl class="mt-14 grid gap-y-4 border-y border-rule py-5 sm:grid-cols-3 sm:gap-x-8">
                <div>
                    <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Current role</dt>
                    <dd class="mt-1 text-sm">Software Engineer, MSU</dd>
                </div>
                <div>
                    <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Working since</dt>
                    <dd class="mt-1 text-sm">January 2023</dd>
                </div>
                <div>
                    <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Domain</dt>
                    <dd class="mt-1 text-sm">Hospital systems, HL7, APIs</dd>
                </div>
            </dl>
        </section>

        {{-- 01 PROFILE --}}
        <section id="about" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">01</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Profile</h2>
                </div>
            </div>

            <div class="mt-8 grid gap-10 md:grid-cols-[1.6fr_1fr] md:gap-16">
                <div class="space-y-4 text-[17px] leading-relaxed text-ink">
                    <p>{{ config('portfolio.personal.summary') }}</p>
                    <p class="text-muted">
                        The work is mostly integration: getting a hospital system, a laboratory system, a PACS and a state records platform to agree on the same patient, the same order and the same result, then keeping that agreement stable in production.
                    </p>
                </div>

                <dl class="space-y-3 border-t border-rule pt-4 text-sm">
                    <div class="flex justify-between gap-4 border-b border-rule pb-3">
                        <dt class="text-muted">Based in</dt>
                        <dd class="text-right">{{ config('portfolio.personal.location') }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-rule pb-3">
                        <dt class="text-muted">Email</dt>
                        <dd class="text-right">
                            <a href="mailto:{{ config('portfolio.personal.email') }}" class="link-ink break-all">{{ config('portfolio.personal.email') }}</a>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-rule pb-3">
                        <dt class="text-muted">LinkedIn</dt>
                        <dd class="text-right">
                            <a href="{{ config('portfolio.personal.linkedin') }}" target="_blank" rel="noopener noreferrer" class="link-ink">{{ config('portfolio.personal.linkedin_display') }}</a>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">Degree</dt>
                        <dd class="text-right">BSc Computer Science, CGPA 3.66</dd>
                    </div>
                </dl>
            </div>
        </section>

        {{-- 02 CAPABILITIES --}}
        <section id="skills" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">02</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Capabilities</h2>
                </div>
            </div>

            <dl class="mt-8">
                @foreach (config('portfolio.skills') as $group)
                    <div class="grid gap-1 border-b border-rule py-4 sm:grid-cols-[14rem_1fr] sm:gap-8">
                        <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">{{ $group['group'] }}</dt>
                        <dd class="text-[15px] leading-relaxed text-ink">{{ implode(', ', $group['items']) }}</dd>
                    </div>
                @endforeach

                <div class="grid gap-1 border-b border-rule py-4 sm:grid-cols-[14rem_1fr] sm:gap-8">
                    <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Languages</dt>
                    <dd class="text-[15px] text-ink">
                        @foreach (config('portfolio.languages') as $lang)
                            {{ $lang['name'] }} ({{ strtolower($lang['level']) }})@if (! $loop->last), @endif
                        @endforeach
                    </dd>
                </div>
            </dl>
        </section>

        {{-- 03 EXPERIENCE --}}
        <section id="experience" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">03</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Experience</h2>
                </div>
            </div>

            <div class="mt-8">
                @foreach (config('portfolio.experiences') as $exp)
                    <article class="grid gap-x-8 gap-y-3 border-b border-rule py-7 sm:grid-cols-[9rem_1fr]">
                        <p class="font-mono text-xs leading-relaxed text-muted">{{ $exp['period'] }}</p>

                        <div>
                            <h3 class="font-serif text-xl font-medium tracking-tight text-ink">{{ $exp['role'] }}</h3>
                            <p class="mt-1 text-sm text-muted">{{ $exp['company'] }}</p>

                            @if (! empty($exp['highlights']))
                                <ul class="mt-4 space-y-2">
                                    @foreach ($exp['highlights'] as $point)
                                        <li class="relative pl-5 text-[15px] leading-relaxed text-ink before:absolute before:left-0 before:top-[0.7em] before:h-px before:w-2.5 before:bg-muted before:content-['']">
                                            {{ $point }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @foreach ($exp['sub_sections'] as $sub)
                                <div class="mt-5">
                                    <h4 class="text-sm font-semibold text-ink">{{ $sub['title'] }}</h4>
                                    <ul class="mt-2 space-y-2">
                                        @foreach ($sub['points'] as $point)
                                            <li class="relative pl-5 text-[15px] leading-relaxed text-muted before:absolute before:left-0 before:top-[0.7em] before:h-px before:w-2.5 before:bg-rule before:content-['']">
                                                {{ $point }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- 04 SELECTED WORK --}}
        <section id="projects" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">04</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Selected work</h2>
                </div>
            </div>

            <div class="mt-8">
                @foreach (config('portfolio.projects') as $project)
                    <article class="grid gap-x-8 gap-y-2 border-b border-rule py-7 sm:grid-cols-[3rem_1fr]">
                        <p class="font-mono text-xs text-muted">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>

                        <div>
                            <h3 class="font-serif text-xl font-medium tracking-tight text-ink">{{ $project['title'] }}</h3>
                            <p class="mt-2 max-w-[60ch] text-[15px] leading-relaxed text-muted">{{ $project['description'] }}</p>

                            <ul class="mt-4 space-y-1.5">
                                @foreach ($project['features'] as $feature)
                                    <li class="relative pl-5 text-[15px] leading-relaxed text-ink before:absolute before:left-0 before:top-[0.7em] before:h-px before:w-2.5 before:bg-muted before:content-['']">
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- 05 EDUCATION --}}
        <section id="education" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">05</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Education</h2>
                </div>
            </div>

            <div class="mt-8">
                @foreach (config('portfolio.education') as $edu)
                    <div class="grid gap-1 border-b border-rule py-4 sm:grid-cols-[9rem_1fr_auto] sm:items-baseline sm:gap-8">
                        <p class="font-mono text-xs text-muted">{{ $edu['period'] }}</p>
                        <div>
                            <p class="font-medium text-ink">{{ $edu['degree'] }}</p>
                            <p class="mt-0.5 text-sm text-muted">{{ $edu['institution'] }}</p>
                        </div>
                        <p class="font-mono text-xs text-ink sm:text-right">{{ $edu['result'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 06 CERTIFICATIONS --}}
        <section id="certs" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">06</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Certifications and awards</h2>
                </div>
            </div>

            <div class="mt-8">
                @foreach (config('portfolio.certifications') as $cert)
                    <div class="grid gap-1 border-b border-rule py-3 sm:grid-cols-[5rem_1fr] sm:gap-8">
                        <p class="font-mono text-xs text-muted">{{ $cert['year'] ?? 'Award' }}</p>
                        <p class="text-[15px] leading-relaxed text-ink">{{ $cert['title'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 07 CONTACT --}}
        <section id="contact" class="mx-auto max-w-5xl px-5 py-14 sm:px-8">
            <div class="border-t border-rule pt-4">
                <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1">
                    <span class="font-mono text-xs text-accent">07</span>
                    <h2 class="font-serif text-2xl font-medium tracking-tight text-ink sm:text-3xl">Contact</h2>
                </div>
                <p class="mt-3 max-w-prose text-[15px] leading-relaxed text-muted">
                    Open to conversations about hospital systems, integration work and backend engineering.
                </p>
            </div>

            <div class="mt-8 grid gap-10 md:grid-cols-[1fr_1.4fr] md:gap-16">
                <dl class="space-y-3 self-start border-t border-rule pt-4 text-sm">
                    <div class="flex justify-between gap-4 border-b border-rule pb-3">
                        <dt class="text-muted">Email</dt>
                        <dd class="text-right">
                            <a href="mailto:{{ config('portfolio.personal.email') }}" class="link-ink break-all">{{ config('portfolio.personal.email') }}</a>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-rule pb-3">
                        <dt class="text-muted">LinkedIn</dt>
                        <dd class="text-right">
                            <a href="{{ config('portfolio.personal.linkedin') }}" target="_blank" rel="noopener noreferrer" class="link-ink">{{ config('portfolio.personal.linkedin_display') }}</a>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="text-muted">Location</dt>
                        <dd class="text-right">{{ config('portfolio.personal.location') }}</dd>
                    </div>
                </dl>

                <form action="{{ route('contact.send') }}#contact" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Name</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                autocomplete="name"
                                required
                                value="{{ old('name') }}"
                                class="min-h-11 w-full border-b border-rule bg-transparent px-0 py-2 text-[15px] text-ink placeholder:text-muted/70 focus:border-accent focus:outline-none"
                                placeholder="Your name"
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required
                                value="{{ old('email') }}"
                                class="min-h-11 w-full border-b border-rule bg-transparent px-0 py-2 text-[15px] text-ink placeholder:text-muted/70 focus:border-accent focus:outline-none"
                                placeholder="you@example.com"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="mb-1.5 block font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Subject</label>
                        <input
                            id="subject"
                            name="subject"
                            type="text"
                            required
                            value="{{ old('subject') }}"
                            class="min-h-11 w-full border-b border-rule bg-transparent px-0 py-2 text-[15px] text-ink placeholder:text-muted/70 focus:border-accent focus:outline-none"
                            placeholder="What the message is about"
                        >
                        @error('subject')
                            <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-1.5 block font-mono text-[11px] uppercase tracking-[0.08em] text-muted">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            class="w-full resize-y border-b border-rule bg-transparent px-0 py-2 text-[15px] leading-relaxed text-ink placeholder:text-muted/70 focus:border-accent focus:outline-none"
                            placeholder="Your message"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap items-center gap-x-5 gap-y-3">
                        <button type="submit" class="inline-flex min-h-11 items-center bg-accent px-5 text-sm font-medium text-white transition-colors hover:bg-accent-deep">
                            Send message
                        </button>
                        <p class="text-sm text-muted">Goes straight to my inbox.</p>
                    </div>

                    @if (session('success'))
                        <p role="status" class="border-l-2 border-accent bg-surface px-3 py-2 text-sm text-ink">
                            {{ session('success') }}
                        </p>
                    @endif
                </form>
            </div>
        </section>
    </main>

    <footer class="mx-auto max-w-5xl px-5 py-8 sm:px-8">
        <div class="flex flex-col gap-2 border-t border-rule pt-5 text-sm text-muted sm:flex-row sm:justify-between">
            <p>&copy; {{ date('Y') }} {{ config('portfolio.personal.name') }}</p>
            <p>
                Built with Laravel.
                <a href="https://ian9598.github.io/portfolio/" class="link-ink">Static GitHub Pages version</a>
            </p>
        </div>
    </footer>
</body>
</html>
