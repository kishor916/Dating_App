<x-home>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h3>Start a new conversation</h3>
        <hr>
        <form action="/messages/{{$user->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient">Recipient</label>
                <input type="text" name="recipient" id="recipient" class="form-control" value="{{$user->first_name}} {{$user->last_name}} "  disabled>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>

</x-home>
