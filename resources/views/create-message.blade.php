<x-home>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Start a new conversation</h3>
            <hr>
            <form action="{{ route('messages.store', $receiver->username) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="recipient">Recipient</label>
                    <input type="text" name="recipient" id="recipient" class="form-control" value="{{ $receiver->first_name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="body">Message</label>
                    <textarea name="body" id="body" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</x-home>
