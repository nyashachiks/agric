from PyQt5.QtWidgets import QDialog
from ui_imagedialog import Ui_Dialog

class ImageDialog(QDialog):
    def __init__(self):
        QDialog.__init__(self)

        # Set up the user interface from Designer.
        self.ui = Ui_Dialog()
        self.ui.setupUi(self)

        # Make some local modifications.
        self.ui.colorDepthCombo.addItem("2 colors (1 bit per pixel)")

        # Connect up the buttons.
        self.ui.okButton.clicked.connect(self.accept)
        self.ui.cancelButton.clicked.connect(self.reject)