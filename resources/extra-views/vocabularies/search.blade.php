<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Vocabulary</h4>
            </div>
            <div class="modal-body">
                <form class="form-group row" id="formSearchVocabulary" action="{{route('involve.vocabulary.search')}}" method="GET">
                    <input type="hidden" name="per_page" value="12">
                    <div class="col-sm-4 form-group">
                        <input type="text" name="word" class="form-control searchVol" placeholder="word">
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="text" name="type" class="form-control searchVol" placeholder="type">
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="text" name="meaning" class="form-control searchVol" placeholder="meaning">
                    </div>
                </form>
                <div id="searchVocabularyTable">

                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('vocabularies.create')}}" target="_blank" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
</div>