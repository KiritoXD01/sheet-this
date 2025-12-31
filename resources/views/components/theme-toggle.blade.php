<div x-data="{
    theme: localStorage.getItem('theme') || 'system',
    init() {
        this.$watch('theme', value => {
            localStorage.setItem('theme', value);
            this.$dispatch('theme-changed', { theme: value });
        });
    },
    cycleTheme() {
        const themes = ['light', 'dark', 'system'];
        const currentIndex = themes.indexOf(this.theme);
        this.theme = themes[(currentIndex + 1) % themes.length];
    },
    getIcon() {
        if (this.theme === 'light') return 'light_mode';
        if (this.theme === 'dark') return 'dark_mode';
        return 'brightness_auto';
    },
    getLabel() {
        if (this.theme === 'light') return 'Light mode';
        if (this.theme === 'dark') return 'Dark mode';
        return 'System theme';
    }
}" class="relative">
    <button
        @click="cycleTheme()"
        :aria-label="getLabel()"
        :title="getLabel()"
        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400 transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-slate-900"
    >
        <span class="material-icons text-xl" x-text="getIcon()"></span>
    </button>
</div>
