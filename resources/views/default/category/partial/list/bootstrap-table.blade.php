            <table class="table" id="main-table" data-url="{!!guard_url('forum/category?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="name">{!! trans('forum::category.label.name')!!}</th>
                    <th data-field="status">{!! trans('forum::category.label.status')!!}</th>
                    <th data-field="user_id">{!! trans('forum::category.label.user_id')!!}</th>
                    <th data-field="created_at">{!! trans('forum::category.label.created_at')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">app.actions</th>
                    </tr>
                </thead>
            </table>