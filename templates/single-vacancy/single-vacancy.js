{
  class VitFileLoader {
    constructor(options) {
      this.options = {
        inputFile: options.inputFile ?? null,
        targetEl: options.targetEl ?? null,
        previewContainer: options.previewContainer ?? null,
        multiple: options.multiple ?? true,
        accept: options.accept ?? null,
        maxFiles: options.maxFiles ?? 5,
      };
      this.selectedFiles = [];
      this.onChangeEventFn = [];

      if (!this.isDOMElement(this.options.targetEl)) {
        throw new Error("targetEl not is DOM Element.");
      }

      if (!this.isDOMElement(this.options.previewContainer)) {
        throw new Error("previewContainer not is DOM Element.");
      }

      this.init();
    }

    init = () => {
      this.options.previewContainer.classList.add("uf-container");
      this.options.targetEl.addEventListener("click", (e) => {
        e.preventDefault();
        this.chooseFiles();
      });

      this.options.previewContainer.addEventListener("click", (e) => {
        if (e.target.closest(".files-picker__preview-container-remove-btn")) {
          const item = e.target.closest(
            ".files-picker__preview-container-item"
          );
          const parent = e.target.closest(".uf-container");
          const index = Array.from(parent.children).indexOf(item);
          this.selectedFiles.splice(index, 1);
          this.runOnChangeEvent();
          this.renderPreviewList();
        }
      });
    };

    chooseFiles = () => {
      const input = document.createElement("input");
      input.className = "uf-hide-element";
      input.type = "file";
      this.options.accept && (input.accept = this.options.accept);
      input.multiple = this.options.multiple;

      input.addEventListener("change", (e) => {
        const files = Array.from(e.target.files);
        this.selectedFiles.push(...files);
        this.selectedFiles.splice(this.options.maxFiles);
        input.remove();

        const dataTransfer = new DataTransfer();
        this.selectedFiles.forEach((file) => dataTransfer.items.add(file));
        this.options.inputFile.files = dataTransfer.files;

        this.runOnChangeEvent();
        this.renderPreviewList();
      });

      document.body.append(input);

      input.click();
    };

    onChange = (fn) => {
      this.onChangeEventFn.push(fn);
    };

    runOnChangeEvent = () => {
      this.onChangeEventFn.forEach((fn) => fn(this.selectedFiles));
    };

    renderPreviewList = () => {
      this.options.previewContainer.innerHTML = "";
      this.selectedFiles.forEach(async (file) => {
        const htmlItem = this.createPreviewItem(file);
        this.options.previewContainer.append(htmlItem);
      });

      this.options.previewContainer.classList.toggle(
        "hidden",
        !this.selectedFiles.length
      );
    };

    createPreviewItem = (file) => {
      const item = document.createElement("div");
      item.className = "files-picker__preview-container-item flex items-center gap-[20px]";

      const fileNameEl = document.createElement("span");
      fileNameEl.className = 'text-white/80';
      fileNameEl.innerText = file.name;

      const fileSizeEl = document.createElement("span");
      fileSizeEl.className = 'ml-auto text-white/50 font-light whitespace-nowrap text-sm';
      fileSizeEl.innerText = VitFileLoader.getTotalSizeInMB([file]).formatted;

      const btnDelete = document.createElement("button");
      btnDelete.type = "button";
      btnDelete.className = "files-picker__preview-container-remove-btn text-white icon-trash h-[24px] w-[24px] flex items-center justify-center transition-colors hover:text-white/80";

      item.append(fileNameEl);
      item.append(fileSizeEl);
      item.append(btnDelete);

      return item;
    };

    createLoadMoreItem = () => {
      const item = document.createElement("button");
      item.type = "button";
      item.className =
        "files-picker__add-more-btn button base-bold button--icon icon--plus button--light";

      item.addEventListener("click", (e) => {
        e.preventDefault();
        this.chooseFiles();
      });

      return item;
    };

    isDOMElement = (obj) => {
      return obj instanceof Element || obj instanceof Document;
    };

    reset = () => {
      this.selectedFiles = [];
      this.runOnChangeEvent();
      this.renderPreviewList();
    };

    static getTotalSizeInMB(files) {
      const totalBytes = files.reduce((sum, file) => sum + file.size, 0);
      const totalMB = totalBytes / (1024 * 1024);

      let formatted;
      if (totalBytes < 1024) {
        formatted = `${totalBytes} b`;
      } else if (totalBytes < 1024 * 1024) {
        formatted = `${(totalBytes / 1024).toFixed(2)} kb`;
      } else if (totalBytes < 1024 * 1024 * 1024) {
        formatted = `${totalMB.toFixed(2)} mb`;
      } else {
        formatted = `${(totalBytes / (1024 * 1024 * 1024)).toFixed(2)} gb`;
      }

      return {
        formatted,
        mb: totalMB,
      };
    }
  }

  function initFileArea() {
    const filePicker = document.querySelector("[data-file-picker]");
    if (filePicker) {
      const mainBtn = filePicker.querySelector('[data-action="choose-files"]');
      const filesPreviewContainer = filePicker.querySelector(
        "[data-files-preview-container]"
      );
      const filesSizeValue = filePicker.querySelector(
        "[data-files-size-value]"
      );
      const btnSubmit = document.querySelector(
        '[data-vacancy-form] button[type="submit"]'
      );

      let choosedfilesSize = 0;
      filePicker.selectedFiles = [];

      const fileLoader = new VitFileLoader({
        inputFile: filePicker.querySelector('input[type="file"]'),
        targetEl: mainBtn,
        previewContainer: filesPreviewContainer,
        multiple: true,
        accept: ".pdf, .doc, .docx, .odt, .rtf, .txt",
      });
      filePicker.instance = fileLoader;

      fileLoader.onChange((files) => {
        choosedfilesSize = VitFileLoader.getTotalSizeInMB(files).mb;

        filePicker.classList.toggle("error", choosedfilesSize > 5);
        btnSubmit.classList.toggle("disabled", choosedfilesSize > 5);
        mainBtn.classList.toggle("disabled", choosedfilesSize > 5);
        mainBtn.classList.toggle("disabled", files.length >= 5);



        filePicker.selectedFiles = files;
      });
    }
  }

  const vacancyForm = document.querySelector("[data-vacancy-form]");
  if (vacancyForm) {
    initFileArea();
  }
}
