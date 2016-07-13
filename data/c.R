
setwd('D:/kohana-demo/data')

library(Rwordseg)
library(stringr)

rr <- data.frame()
dd <- read.csv('c.csv', header=F, fileEncoding='UTF-8')
for(i in 1:nrow(dd)) {
	rr[i, 1] <- dd[i,'V1'];
	
	a2 <- segmentCN(as.character(dd[i,'V2']))
	rr[i, 2] <- paste(a2[str_length(a2)>1], collapse='|')
	
	rr[i, 3] <- dd[i,'V3'];
	
	a4 <- segmentCN(as.character(dd[i,'V4']))
	rr[i, 4] <- paste(a4[str_length(a4)>1], collapse='|')
	
}

write.table(rr, file='d.csv', quote=F, sep=",", row.names=F, col.names=F)