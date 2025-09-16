<div data-file-picker class="files-picker">
    <input name="user-files" class="absolute -z-1 invisible" type="file" multiple="true" accept=".pdf, .doc, .docx, .odt, .rtf, .txt">
    <!-- hidden -->
    <div data-files-preview-container class="files-picker__preview-container mb-[12px] flex flex-col gap-[10px]">
        <div class="files-picker__preview-container-item flex items-center gap-[20px]">
            <span class="text-white/80">fakefile_1MB.doc</span>
            <span class="ml-auto text-white/50 font-light whitespace-nowrap text-sm">120.40 kb</span>
            <button type="button" class="files-picker__preview-container-remove-btn text-white icon-trash h-[24px] w-[24px] flex items-center justify-center transition-colors hover:text-white/80"></button>
        </div>
    </div>
    <button type="button" data-action="choose-files" class="files-picker__main-btn btn btn--dark">
        Share Drawings Here
    </button>
    <div class="files-picker__size-info mt-[5px] text-xs text-white/60">Max file size 5Mb.<br />Extensions: .pdf, .doc, .docx, .odt, .rtf, .txt</div>
</div>

                        <form action="/">
                            <div class="h4 font-bold text-color-dark">
                                Submit your application
                            </div>
                            <div class="mt-[16px] form-fields grid gap-[24px]">
                                <div>
                                    <label class="flex flex-col gap-[4px]">
                                        <span class="text-xs">Your name *</span>
                                        <input name="your-name" type="text" class="input" placeholder="Enter your name" required>
                                    </label>
                                </div>
                                <div data-mask="9{*}">
                                    <label class="flex flex-col gap-[4px]">
                                        <span class="text-xs">Your phone *</span>
                                        <input name="phone" type="text" class="input" placeholder="Enter your phone" required>
                                    </label>
                                </div>
                                <div>
                                    <label class="flex flex-col gap-[4px]">
                                        <span class="text-xs">Your e-mail *</span>
                                        <input name="email" type="email" class="input" placeholder="Enter your e-mail" required>
                                    </label>
                                </div>
                                <div data-adaptive-textarea>
                                    <label class="flex flex-col gap-[4px]">
                                        <span class="text-xs">Messege</span>
                                        <textarea name="message" class="textarea" placeholder="Your Request Notes"></textarea>
                                    </label>
                                </div>
                                <div data-file-picker class="files-picker">
                                    <input name="user-files" class="absolute -z-1 invisible" type="file" multiple="true" accept=".pdf, .doc, .docx, .odt, .rtf, .txt">
                                    <div data-files-preview-container class="files-picker__preview-container mb-[12px] flex flex-col gap-[10px] empty:hidden"></div>
                                    <button type="button" data-action="choose-files" class="files-picker__main-btn btn btn--dark !min-h-[38px]">
                                        Share Drawings Here
                                    </button>
                                    <div class="files-picker__size-info mt-[5px] text-xs text-white/60">
                                        <span>Maximum file size: 5 MB.</span><br>
                                        You can upload up to 5 files.
                                        <br/>Supported formats: .pdf, .doc, .docx, .odt, .rtf, .txt
                                    </div>
                                </div>
                            </div>
                            <div class="mt-[30px] buttons-group sm:justify-center">
                                <button type="submit" class="btn btn--dark">
                                    Send
                                </button>
                            </div>
                        </form>