<div >
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
        
        <nav>
            <ul class="pagination" style="justify-content: center;">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled " aria-disabled="true" aria-label="@lang('pagination.previous')" >
                        <span class="page-link" style="padding: .5rem 3rem;border-top-right-radius:20px;border-bottom-right-radius:20px" aria-hidden="true">السابق</span>
                    </li>
                @else
                    <li class="page-item  " >
                        <button type="button" style="padding: .5rem 3rem;border-top-right-radius:20px;border-bottom-right-radius:20px" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link edit" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">السابق</button>
                    </li>
                @endif

                
                @if ($paginator->hasMorePages())
                    <li class="page-item pr-3 pl-3">
                        <button type="button" style="padding: .5rem 3rem;border-top-left-radius:20px;border-bottom-left-radius:20px" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link edit" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">التالي</button>
                    </li>
                @else
                    <li class="page-item disabled pr-3 pl-3" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" style="padding: .5rem 3rem;border-top-left-radius:20px;border-bottom-left-radius:20px" aria-hidden="true">التالي</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
