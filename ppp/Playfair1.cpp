//Lap trinh ma hoa va giai ma thong diep theo thuat toan Playfair
//1. Nhap mot tu khoa bat ky. Loai bo cac ky tu trung lap trong chuoi
//2. Dien them vao chui tren nhung ki tu con lai trong bang chu cai
//3. Dat chuoi thu duoc va ma tran khoa 5x5
#include<iostream>
using namespace std;
int main(){
	string K;
	string B = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
	char A[5][5]; 
	int index = 0;
	cout<<"Nhap chuoi khoa K: "; getline(cin, K);
	K += B;
	for(int i = 0; i < K.size(); i++){
		for(int j = i + 1; j < K.size(); j++){
			if(K[j] == K[i]){
				K.erase(j, 1);
				j--;
			}
		}
	}
	cout<<"Chuoi day du: "<<K<<endl;
	//Hien thi thanh ma tran 5x5
	for(int i = 0; i < 5; i++){
		for(int j = 0; j < 5; j++){
			A[i][j] = K[index];
			index++;
		}
	}
	for(int i = 0; i < 5; i++){
		for(int j = 0; j < 5; j++){
			cout<<A[i][j]<<" ";
		}
		cout<<endl;
	}
	
	//Nhap plaintext
	string P;
	cout<<"Nhap plaintext can ma hoa: "; getline(cin, P);
	for(int i = 0; i < P.size(); i++){
		if(P[i] == 'J'){
			P[i] = 'I';
		}
	}
	for(int i = 0; i < P.size(); i+= 2){
		if(i + 1 == P.size()){
			P += 'X'; //them X neu chuoi so le
		}
		else if(P[i] == P[i + 1]){
			P.insert(i + 1, 1, 'X'); 
		}
	}
	cout<<"Chuoi sau xu ly: "<<P<<endl;
	//Ma hoa tung cap ki tu
	cout << "Thong diep sau ma hoa: ";
	for (int i = 0; i < P.size(); i += 2) {
		char a = P[i], b = P[i + 1];
		int row1, col1, row2, col2;

		// Tìm vi tri a và b trong ma tran A
		for (int r = 0; r < 5; r++) {
			for (int c = 0; c < 5; c++) {
				if (A[r][c] == a) {
					row1 = r; col1 = c;
				}
				if (A[r][c] == b) {
					row2 = r; col2 = c;
				}
			}
		}

		// Áp dung luat Playfair
		if (row1 == row2) {
			// Cùng hang
			cout << A[row1][(col1 + 1) % 5];
			cout << A[row2][(col2 + 1) % 5];
		} else if (col1 == col2) {
			// Cùng cot
			cout << A[(row1 + 1) % 5][col1];
			cout << A[(row2 + 1) % 5][col2];
		} else {
			// Khac hang khac cot
			cout << A[row1][col2];
			cout << A[row2][col1];
		}
	}
	cout << endl;
	cout << "\nGiai ma thong diep vua roi:";
	string C; // chuoi giai ma
	for (int i = 0; i < P.size(); i += 2) {
		char a = P[i], b = P[i + 1];
		int row1, col1, row2, col2;

		// Tim vi tri cua a va b trong ma tran A
		for (int r = 0; r < 5; r++) {
			for (int c = 0; c < 5; c++) {
				if (A[r][c] == a) {
					row1 = r; col1 = c;
				}
				if (A[r][c] == b) {
					row2 = r; col2 = c;
				}
			}
		}

		// Giai ma theo luat Playfair
		if (row1 == row2) {
			// Cung hang: lui ve ben trai
			cout<< A[row1][(col1 + 4) % 5];
			cout<< A[row2][(col2 + 4) % 5];
		}
		else if (col1 == col2) {
			// Cung cot: lui len tren
			cout<< A[(row1 + 4) % 5][col1];
			cout<< A[(row2 + 4) % 5][col2];
		}
		else {
			// Khac hang khac cot: doi cot nhu khi ma hoa
			cout<< A[row1][col2];
			cout<< A[row2][col1];
		}
	}
	cout<<endl;
}
