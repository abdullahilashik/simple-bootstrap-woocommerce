<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form action="">
            <div class="input-group">
                <input class="form-control" name="s" type="text" value="<?= get_search_query(); ?>" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
            <input type="hidden" name="post_type" id="post_type" value="product">
        </form>
    </div>
</div>