import './bootstrap';

// Mobile navigation: labelled trigger, Escape closes, focus returns.
const trigger = document.getElementById('nav-toggle');
const panel = document.getElementById('nav-panel');

if (trigger && panel) {
    const setOpen = (open) => {
        panel.classList.toggle('hidden', !open);
        trigger.setAttribute('aria-expanded', String(open));
    };

    trigger.addEventListener('click', () => {
        setOpen(panel.classList.contains('hidden'));
    });

    panel.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !panel.classList.contains('hidden')) {
            setOpen(false);
            trigger.focus();
        }
    });
}
