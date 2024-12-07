<?php include('../../header.php'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Quản Lý Tin Tức</h1>
    <a href="/admin/news/add" class="btn btn-success mb-3">Thêm Bài Viết</a>

    <?php if (empty($articles)): ?>
        <div class="alert alert-warning">Không có bài viết nào!</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Ngày Tạo</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo $article['id']; ?></td>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></td>
                            <td>
                                <a href="/admin/news/edit/<?php echo $article['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="/admin/news/delete/<?php echo $article['id']; ?>" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include('../../footer.php'); ?>