<div class="text-center my-5">
    <button type="button" id="btnCloseTicket" class="btn btn-primary btn-rounded btn-scale-press w-75"
        data-bs-toggle="modal" data-bs-target="#closeTicketModal">
        Fermer ce ticket
    </button>
</div>
<div class="modal fade" id="closeTicketModal" tabindex="-1" aria-labelledby="closeTicketModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered m-auto px-2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fermer le ticket:
                    #{{ $ticket[0]->ticket_number }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <p class="text-danger fs-5 fw-bold">ATTENTION </p>
                <p class="text-danger fs-5 fw-bold">CETTE ACTION EST DÉFÉNITIVE</p>
                <p class="fs-5 fw-bold text-center"> Êtes-vous certain de vouloir fermer ce ticket?</p>
                <p class="fs-5 fw-bold text-center">Le status du ticket sera: <span class="text-danger">Fermé</span></p>
                <span class="span-date-msg">*l'historique de la conversation sera toujours disponible</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-scale-press"
                    data-bs-dismiss="modal">Annuler</button>

                <form action="{{ route('admin.ticket.destroy', $ticket[0]->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ticket_id" value="{{ $ticket[0]->id }}">
                    <input type="hidden" name="status" value="closed">
                    <button type="submit" class="btn btn-primary btn-scale-press" id="btnCloseModalYes">Fermer</button>
                </form>
            </div>
        </div>
    </div>
</div>
