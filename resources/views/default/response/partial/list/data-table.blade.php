            <table class="table" id="main-table" data-url="{!!guard_url('forum/response?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="question_id">{!! trans('forum::response.label.question_id')!!}</th>
                    <th data-field="comment">{!! trans('forum::response.label.comment')!!}</th>
                    <th data-field="status">{!! trans('forum::response.label.status')!!}</th>
                    <th data-field="best_answer">{!! trans('forum::response.label.best_answer')!!}</th>
                    <th data-field="user_id">{!! trans('forum::response.label.user_id')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">app.actions</th>
                    </tr>
                </thead>
            </table>