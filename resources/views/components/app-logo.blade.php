<div class="flex aspect-square size-8 items-center justify-center rounded-md text-accent-foreground">
    
</div>
<div class="ms-1 grid flex-1 text-start text-sm">
    <span class="mb-0.5 truncate leading-none font-semibold">
        
        <span class="text-foreground">
            {{ $slot }}
        </span>
        <span class="text-muted-foreground">
            {{ $attributes->get('description') }}
            
    </span>
</div>