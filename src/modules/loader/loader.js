class Loader {
    static create() {
        const loader = document.createElement('div');
        loader.className = 'loader text-accent-first absolute z-10 flex items-center justify-center';
        loader.insertAdjacentHTML('beforeend', `
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        `);

        loader.addTo = (container) => {
            if (!container) return;
            container.append(loader);
        }

        return loader;
    }
}