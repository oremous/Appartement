
<div wire:ignore.self>
    @if($currentPage == PAGECREATEFORM)
        @include("livewire.utilisateurs.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.utilisateurs.liste")
    @endif
</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            toast: true,
            title: event.detail.message || "Operation effectuee avec success!",
            showConfirmButton: false,
            timer: 5000
        })
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text ,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, continuer',
            cancelButtonText: 'Non, abandonner'
            }).then((result) => {
            if (result.isConfirmed) {
                if(event.detail.message.data){
                    @this.deleteUser(event.detail.message.data.user_id)
                }
                @this.resetPassword()
            }
        })
    })
</script>
