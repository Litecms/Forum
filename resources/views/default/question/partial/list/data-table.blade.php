            <table class="table" id="main-table" data-url="{!!guard_url('forum/question?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="category_id">{!! trans('forum::question.label.category_id')!!}</th>
                    <th data-field="user_id">{!! trans('forum::question.label.user_id')!!}</th>
                    <th data-field="title">{!! trans('forum::question.label.title')!!}</th>
                    <th data-field="viewcount">{!! trans('forum::question.label.viewcount')!!}</th>
                    <th data-field="published">{!! trans('forum::question.label.published')!!}</th>
                    <th data-field="status">{!! trans('forum::question.label.status')!!}</th>
                    <th data-field="created_at">{!! trans('forum::question.label.created_at')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">app.actions</th>
                    </tr>
                </thead>
            </table>