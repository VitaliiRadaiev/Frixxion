class VitFileLoader {
    constructor(options) {
        this.options = {
            targetEl: options.targetEl ?? null,
            previewContainer: options.previewContainer ?? null,
            multiple: options.multiple ?? true,
            accept: options.accept ?? null,
            maxFiles: options.maxFiles ?? 10,
        }
        this.selectedFiles = [];
        this.onChangeEventFn = [];

        if (!this.isDOMElement(this.options.targetEl)) {
            throw new Error('targetEl not is DOM Element.')
        }

        if (!this.isDOMElement(this.options.previewContainer)) {
            throw new Error('previewContainer not is DOM Element.')
        }

        this.init();

    }

    init = () => {
        this.options.previewContainer.classList.add('uf-container');
        this.options.targetEl.addEventListener('click', (e) => {
            e.preventDefault();
            this.chooseFiles();
        });

        this.options.previewContainer.addEventListener('click', (e) => {
            if (e.target.closest('.files-picker__preview-container-remove-btn')) {
                const item = e.target.closest('.files-picker__preview-container-item');
                const parent = e.target.closest('.uf-container');
                const index = Array.from(parent.children).indexOf(item);
                this.selectedFiles.splice(index, 1);
                this.runOnChangeEvent();
                this.renderPreviewList();
            }
        });
    }

    chooseFiles = () => {
        const input = document.createElement('input');
        input.className = 'uf-hide-element';
        input.type = 'file';
        this.options.accept && (input.accept = this.options.accept);
        input.multiple = this.options.multiple

        input.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            this.selectedFiles.push(...files);
            this.selectedFiles.splice(this.options.maxFiles);
            input.remove();

            this.runOnChangeEvent();
            this.renderPreviewList();
        });

        document.body.append(input);

        input.click();
    }

    onChange = (fn) => {
        this.onChangeEventFn.push(fn);
    }

    runOnChangeEvent = () => {
        this.onChangeEventFn.forEach(fn => fn(this.selectedFiles));
    }

    renderPreviewList = () => {
        this.options.previewContainer.innerHTML = '';
        this.selectedFiles.forEach(async (file) => {
            const htmlItem = this.createPreviewItem(file);
            this.options.previewContainer.append(htmlItem);
        });

        (this.selectedFiles.length && this.selectedFiles.length < this.options.maxFiles)
            && (this.options.previewContainer.append(this.createLoadMoreItem()));

        this.options.previewContainer.classList.toggle('hidden', !this.selectedFiles.length);
    }

    createPreviewItem = (file) => {
        const item = document.createElement('div');
        item.className = 'files-picker__preview-container-item';

        const span = document.createElement('span');
        span.innerText = file.name;

        const btnDelete = document.createElement('button');
        btnDelete.type = 'button';
        btnDelete.className = 'files-picker__preview-container-remove-btn';

        item.append(span);
        item.append(btnDelete);

        return item;
    }

    createLoadMoreItem = () => {
        const item = document.createElement('button');
        item.type = 'button';
        item.className = 'files-picker__add-more-btn button base-bold button--icon icon--plus button--light';

        item.addEventListener('click', (e) => {
            e.preventDefault();
            this.chooseFiles();
        })

        return item;
    }

    isDOMElement = (obj) => {
        return obj instanceof Element || obj instanceof Document;
    }

    reset = () => {
        this.selectedFiles = [];
        this.runOnChangeEvent();
        this.renderPreviewList();
    }
}