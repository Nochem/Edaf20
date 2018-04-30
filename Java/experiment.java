package javafx;

import javafx.application.Application;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;


public class experiment extends Application {
	private Button solve, clear, fill;
	private GridPane grid, superGrid;
	//private Stage mainStage;
	private TextField[][] referenceMatrix;

	public static void main(String[] args) {
		Application.launch(args);
	}

	@Override
	public void start(Stage mainStage) throws Exception {
	//	this.mainStage = mainStage;
		referenceMatrix = new TextField[9][9];
		gridRender(mainStage);
	}

	@Override
	public void stop() {
		//There are no breaks
	}






	// Renders the UI
	// Don't let me work with frontend. Ever.
	private void gridRender(Stage mainStage) {
		superGrid = new GridPane();
		superGrid.setPadding(new Insets(5, 5, 5, 5));
		for (int sRow = 0; sRow < 3; sRow++) {
			for (int sCol = 0; sCol < 3; sCol++) {
				grid = new GridPane();
				grid.setPadding(new Insets(2, 2, 2, 2));
				for (int row = 0; row < 3; row++) {
					for (int col = 0; col < 3; col++) {
						TextField nbr = new TextField();
						referenceMatrix[row + (sRow * 3)][col + (sCol * 3)] = nbr;
						grid.add(nbr, col, row);
					}
				}
				superGrid.add(grid, sCol, sRow);
			}
		}
		BorderPane pane = new BorderPane(superGrid);
		pane.setPrefWidth(300);
		pane.setPrefHeight(350);
		pane.setBottom(buttonRender());
		Scene scene = new Scene(pane);
		mainStage.setScene(scene);
		mainStage.show();
	}

	private HBox buttonRender(){
		HBox hbox = new HBox();
		solve = new Button("Solve");
		//solve.setOnAction(e -> solve());
		clear = new Button("Clear");
		//clear.setOnAction(e -> clear());
		fill = new Button ("Fill");
		//fill.setOnAction(e -> fill());
		hbox.setPadding(new Insets(5, 15, 15, 70));
		hbox.setSpacing(15);
		hbox.getChildren().addAll(solve, clear, fill);
		return hbox;
	}
	
	// Alert dialog
	private void alert(String title, String headerText, String infoText) {
		Alert alert = new Alert(AlertType.INFORMATION);
		alert.setTitle(title);
		alert.setHeaderText(headerText);
		alert.setContentText(infoText);
		alert.showAndWait();
	}

	
}
