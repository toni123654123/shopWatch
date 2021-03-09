function showSuccessToast(msg) {
  toast({
    title: "Thành công!",
    message: msg,
    type: "success",
    duration: 5000,
  });
}

function showErrorToast(msg) {
  toast({
    title: "Thất bại!",
    message: msg,
    type: "error",
    duration: 5000,
  });
}
