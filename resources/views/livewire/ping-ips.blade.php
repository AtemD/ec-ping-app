<div>
    <div>

        <label class="flex cursor-pointer gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5" />
                <path
                    d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
            </svg>
            <input type="checkbox" value="light" class="toggle theme-controller" />
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
            </svg>
        </label>

        <br>
        <button id="clickButton" wire:click="pingIps" class="btn btn-primary">PN</button>
        <br>

        

        <div class="card bg-base-100 w-96 shadow-xl border-solid border-1">
            <div class="card-body p-1">
                <h2 class="card-title">
                    <livewire:ping-status>
                    
                    T N
                </h2>
                
                <ul class="list-none h-14 overflow-hidden">
                    <li wire:stream="pingResponse" class="text-sm">{{ $output }}</li>
                </ul>
            </div>
          </div>

    </div>

</div>
