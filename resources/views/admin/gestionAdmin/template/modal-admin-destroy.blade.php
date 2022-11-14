<div class="text-center my-2 d-flex justify-content-sm-center justify-content-md-start">
    <button type="button" id="btnCloseTicket" class="btn-scale btn btn-link text-primary p-0 pb-4 text-decoration-none"
        data-bs-toggle="modal" data-bs-target="#closeTicketModal">Supprimer l'administrateur</button>
</div>
<div class="modal fade" id="closeTicketModal" tabindex="-1" aria-labelledby="closeTicketModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered m-auto px-2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppression du compte administrateur
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <p class="fs-5 fw-bold text-center"> SUPPRIMER LE COMPTE ADMIN</p>
                <p class="text-danger fs-5 fw-bold">{{ $selectedAdmin->email }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-scale-press"
                    data-bs-dismiss="modal">Annuler</button>

                <form action="{{ route('admin.admin.destroy', ' ') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="client_id" value="{{ $selectedAdmin->id }}">
                    <input type="hidden" name="soft_deleted" value="true">
                    <button type="submit" class="btn btn-primary btn-scale-press" id="btnCloseModalYess">Supprimer le
                        compte</button>
                </form>
            </div>
        </div>
    </div>
</div>