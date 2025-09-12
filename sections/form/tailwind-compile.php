          <form action="/">
              <div class="h4 font-bold text-color-dark">
                  Leave a request
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
                  <div>
                      <label class="flex flex-col gap-[4px]">
                          <span class="text-xs">Company</span>
                          <input name="company" type="text" class="input" placeholder="Enter your company">
                      </label>
                  </div>
                  <div data-adaptive-textarea>
                      <label class="flex flex-col gap-[4px]">
                          <span class="text-xs">Messege</span>
                          <textarea name="message" class="textarea" placeholder="Your Request Notes"></textarea>
                      </label>
                  </div>
              </div>
              <div class="mt-[30px] buttons-group sm:justify-center">
                  <button type="submit" class="btn btn--accent-first">
                      Send
                  </button>
              </div>
          </form>